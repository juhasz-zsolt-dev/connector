<?php

namespace App\Http\Integrations\Stripe\Requests\PaymentMethods;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a PaymentMethod
 */
class UpdatePaymentMethod extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/payment_methods/{$this->paymentMethod}";
    }

    public function __construct(
        protected string $paymentMethod,
    ) {
    }
}
