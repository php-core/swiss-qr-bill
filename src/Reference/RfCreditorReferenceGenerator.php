<?php declare(strict_types=1);

namespace PHPCore\SwissQrBill\Reference;

use kmukku\phpIso11649\phpIso11649;
use PHPCore\SwissQrBill\String\StringModifier;
use PHPCore\SwissQrBill\Validator\Exception\InvalidCreditorReferenceException;
use PHPCore\SwissQrBill\Validator\SelfValidatableInterface;
use PHPCore\SwissQrBill\Validator\SelfValidatableTrait;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

final class RfCreditorReferenceGenerator implements SelfValidatableInterface
{
    use SelfValidatableTrait;

    public static function generate(string $reference): string
    {
        $generator = new self($reference);

        return $generator->doGenerate();
    }

    private function __construct(private string $reference)
    {
        $this->reference = StringModifier::stripWhitespace($reference);
    }

    public function doGenerate(): string
    {
        if (!$this->isValid()) {
            throw new InvalidCreditorReferenceException(
                'The provided data is not valid to generate a creditor reference.'
            );
        }

        $generator = new phpIso11649();

        return $generator->generateRfReference($this->reference, false);
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        $metadata->addPropertyConstraints('reference', [
            new Assert\Regex(
                pattern: '/^[a-zA-Z0-9]*$/',
                match: true
            ),
            new Assert\Length(
                min: 1,
                max: 21 // 25 minus 'RF' prefix minus 2-digit check sum
            ),
            new Assert\NotBlank()
        ]);
    }
}
