<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Generate invoice number
 */
class GenerateInvoiceNumber extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v2/invoicing/generate-next-invoice-number';
    }

    public function __construct()
    {
    }
}
