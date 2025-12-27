<?php declare(strict_types=1);

namespace PHPCore\SwissQrBill\DataGroup\EmptyElement;

use PHPCore\SwissQrBill\DataGroup\QrCodeableInterface;

/**
 * @internal
 */
final class EmptyLine implements QrCodeableInterface
{
    public function getQrCodeData(): array
    {
        return [
            null
        ];
    }
}
