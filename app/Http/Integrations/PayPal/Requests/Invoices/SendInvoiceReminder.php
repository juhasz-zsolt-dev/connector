<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send invoice reminder
 */
class SendInvoiceReminder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/invoicing/invoices/{$this->invoiceId}/remind";
    }

    public function __construct(
        protected string $invoiceId,
        protected mixed $subject = null,
        protected mixed $note = null,
        protected mixed $sendToRecipient = null,
        protected mixed $additionalRecipients = null,
        protected mixed $sendToInvoicer = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'subject' => $this->subject,
            'note' => $this->note,
            'send_to_recipient' => $this->sendToRecipient,
            'additional_recipients' => $this->additionalRecipients,
            'send_to_invoicer' => $this->sendToInvoicer,
        ]);
    }
}
