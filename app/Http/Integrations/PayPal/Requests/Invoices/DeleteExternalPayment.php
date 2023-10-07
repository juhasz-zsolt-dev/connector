<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete external payment
 */
class DeleteExternalPayment extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v2/invoicing/invoices/{$this->invoiceId}/payments/{$this->transactionId}";
    }

    public function __construct(
        protected string $invoiceId,
        protected string $transactionId,
    ) {
    }
}
