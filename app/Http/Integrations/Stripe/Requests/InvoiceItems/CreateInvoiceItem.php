<?php

namespace App\Http\Integrations\Stripe\Requests\InvoiceItems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create an invoice item
 */
class CreateInvoiceItem extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/invoiceitems';
    }

    public function __construct()
    {
    }
}
