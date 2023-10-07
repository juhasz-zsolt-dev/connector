<?php

namespace App\Http\Integrations\Stripe\Requests\PaymentMethods;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a PaymentMethod
 */
class CreatePaymentMethod extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/payment_methods';
    }

    public function __construct()
    {
    }
}
