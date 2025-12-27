<?php declare(strict_types=1);

namespace PHPCore\SwissQrBill\DataGroup;

/**
 * @internal
 */
interface QrCodeableInterface
{
    /**
     * @return list<string|int|null>
     */
    public function getQrCodeData(): array;
}
