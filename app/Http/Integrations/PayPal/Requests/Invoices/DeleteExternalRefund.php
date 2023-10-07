<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete external refund
 */
class DeleteExternalRefund extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v2/invoicing/invoices/{$this->invoiceId}/refunds/{$this->transactionId}";
    }

    public function __construct(
        protected string $invoiceId,
        protected string $transactionId,
    ) {
    }
}
