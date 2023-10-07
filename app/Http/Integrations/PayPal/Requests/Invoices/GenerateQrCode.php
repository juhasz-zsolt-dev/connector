<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Generate QR code
 */
class GenerateQrCode extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/invoicing/invoices/{$this->invoiceId}/generate-qr-code";
    }

    public function __construct(
        protected string $invoiceId,
        protected mixed $width = null,
        protected mixed $height = null,
        protected mixed $action = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['width' => $this->width, 'height' => $this->height, 'action' => $this->action]);
    }
}
