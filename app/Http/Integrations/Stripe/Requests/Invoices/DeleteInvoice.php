<?php

namespace App\Http\Integrations\Stripe\Requests\Invoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete an invoice
 */
class DeleteInvoice extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/invoices/{$this->invoice}";
    }

    public function __construct(
        protected string $invoice,
    ) {
    }
}
