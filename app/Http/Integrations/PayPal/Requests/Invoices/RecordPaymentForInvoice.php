<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Record payment for invoice
 */
class RecordPaymentForInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/invoicing/invoices/{$this->invoiceId}/payments";
    }

    public function __construct(
        protected string $invoiceId,
        protected mixed $method = null,
        protected mixed $paymentDate = null,
        protected mixed $amount = null,
        protected mixed $type = null,
        protected mixed $transactionType = null,
        protected mixed $note = null,
        protected mixed $shippingInfo = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'method' => $this->method,
            'payment_date' => $this->paymentDate,
            'amount' => $this->amount,
            'type' => $this->type,
            'transaction_type' => $this->transactionType,
            'note' => $this->note,
            'shipping_info' => $this->shippingInfo,
        ]);
    }
}
