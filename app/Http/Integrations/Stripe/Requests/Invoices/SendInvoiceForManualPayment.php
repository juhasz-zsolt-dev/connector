<?php

namespace App\Http\Integrations\Stripe\Requests\Invoices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send an invoice for manual payment
 */
class SendInvoiceForManualPayment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/invoices/{$this->invoice}/send";
    }

    public function __construct(
        protected string $invoice,
    ) {
    }
}
