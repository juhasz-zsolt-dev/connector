<?php

namespace App\Http\Integrations\Stripe\Requests\InvoiceItems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete an invoice item
 */
class DeleteInvoiceItem extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/invoiceitems/{$this->invoiceitem}";
    }

    public function __construct(
        protected string $invoiceitem,
    ) {
    }
}
