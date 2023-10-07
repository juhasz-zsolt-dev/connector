<?php

namespace App\Http\Integrations\Stripe\Requests\Checkout;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a Session
 */
class CreateSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/checkout/sessions';
    }

    public function __construct()
    {
    }
}
