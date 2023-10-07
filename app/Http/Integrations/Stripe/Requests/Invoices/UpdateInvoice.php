<?php

namespace App\Http\Integrations\Stripe\Requests\Invoices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update an invoice
 */
class UpdateInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/invoices/{$this->invoice}";
    }

    public function __construct(
        protected string $invoice,
    ) {
    }
}
