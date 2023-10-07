<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fully update invoice
 */
class FullyUpdateInvoice extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/v2/invoicing/invoices/{$this->invoiceId}";
    }

    /**
     * @param  null|string  $sendToRecipient Indicates whether to send the invoice update notification to the recipient.
     * @param  null|string  $sendToInvoicer Indicates whether to send the invoice update notification to the merchant.
     */
    public function __construct(
        protected string $invoiceId,
        protected mixed $id = null,
        protected mixed $status = null,
        protected mixed $detail = null,
        protected mixed $invoicer = null,
        protected mixed $primaryRecipients = null,
        protected mixed $items = null,
        protected mixed $configuration = null,
        protected mixed $amount = null,
        protected ?string $sendToRecipient = null,
        protected ?string $sendToInvoicer = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'id' => $this->id,
            'status' => $this->status,
            'detail' => $this->detail,
            'invoicer' => $this->invoicer,
            'primary_recipients' => $this->primaryRecipients,
            'items' => $this->items,
            'configuration' => $this->configuration,
            'amount' => $this->amount,
        ]);
    }

    public function defaultQuery(): array
    {
        return array_filter(['send_to_recipient' => $this->sendToRecipient, 'send_to_invoicer' => $this->sendToInvoicer]);
    }
}
