<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel sent invoice
 */
class CancelSentInvoice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/invoicing/invoices/{$this->invoiceId}/cancel";
    }

    public function __construct(
        protected string $invoiceId,
        protected mixed $subject = null,
        protected mixed $note = null,
        protected mixed $sendToInvoicer = null,
        protected mixed $sendToRecipient = null,
        protected mixed $additionalRecipients = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'subject' => $this->subject,
            'note' => $this->note,
            'send_to_invoicer' => $this->sendToInvoicer,
            'send_to_recipient' => $this->sendToRecipient,
            'additional_recipients' => $this->additionalRecipients,
        ]);
    }
}
