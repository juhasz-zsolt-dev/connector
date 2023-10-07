<?php

namespace App\Http\Integrations\PayPal\Requests\Payments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show captured payment details
 */
class ShowCapturedPaymentDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v2/payments/captures/{$this->captureId}";
    }

    public function __construct(
        protected string $captureId,
    ) {
    }
}
