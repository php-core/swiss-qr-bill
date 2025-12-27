<?php declare(strict_types=1);

namespace PHPCore\SwissQrBill\PaymentPart\Output;

use PHPCore\SwissQrBill\QrBill;

interface OutputInterface
{
    public function getQrBill(): ?QrBill;

    public function getLanguage(): ?string;

    public function getPaymentPart(): ?string;

    public function setDisplayOptions(DisplayOptions $displayOptions): static;

    public function getDisplayOptions(): DisplayOptions;

    public function setQrCodeImageFormat(string $imageFormat): static;

    public function getQrCodeImageFormat(): string;
}
