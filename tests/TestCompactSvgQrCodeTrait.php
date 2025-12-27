<?php declare(strict_types=1);

namespace PHPCore\Tests\SwissQrBill;

trait TestCompactSvgQrCodeTrait
{
    public static function getCompact(): string
    {
        if (defined('Endroid\QrCode\Writer\SvgWriter::WRITER_OPTION_COMPACT')) {
            return '-compact';
        }

        return '';
    }
}
