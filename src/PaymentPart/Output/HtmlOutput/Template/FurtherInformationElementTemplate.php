<?php declare(strict_types=1);

namespace PHPCore\SwissQrBill\PaymentPart\Output\HtmlOutput\Template;

class FurtherInformationElementTemplate
{
    public const TEMPLATE = <<<EOT
<p>{{ text }}</p>
EOT;
}
