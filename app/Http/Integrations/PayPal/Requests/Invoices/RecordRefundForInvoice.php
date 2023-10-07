<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Record refund for invoice
 */
class RecordRefundForInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/invoicing/invoices/{$this->invoiceId}/refunds";
    }

    public function __construct(
        protected string $invoiceId,
        protected mixed $method = null,
        protected mixed $refundDate = null,
        protected mixed $amount = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['method' => $this->method, 'refund_date' => $this->refundDate, 'amount' => $this->amount]);
    }
}
