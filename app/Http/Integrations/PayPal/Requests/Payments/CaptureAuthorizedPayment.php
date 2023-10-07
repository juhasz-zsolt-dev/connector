<?php

namespace App\Http\Integrations\PayPal\Requests\Payments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Capture authorized payment
 */
class CaptureAuthorizedPayment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/payments/authorizations/{$this->authorizationId}/capture";
    }

    public function __construct(
        protected string $authorizationId,
        protected mixed $amount = null,
        protected mixed $invoiceId = null,
        protected mixed $finalCapture = null,
        protected mixed $noteToPayer = null,
        protected mixed $softDescriptor = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'amount' => $this->amount,
            'invoice_id' => $this->invoiceId,
            'final_capture' => $this->finalCapture,
            'note_to_payer' => $this->noteToPayer,
            'soft_descriptor' => $this->softDescriptor,
        ]);
    }
}
