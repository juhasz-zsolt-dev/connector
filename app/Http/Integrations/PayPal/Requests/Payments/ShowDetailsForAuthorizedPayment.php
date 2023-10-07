<?php

namespace App\Http\Integrations\PayPal\Requests\Payments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show details for authorized payment
 */
class ShowDetailsForAuthorizedPayment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v2/payments/authorizations/{$this->authorizationId}";
    }

    public function __construct(
        protected string $authorizationId,
    ) {
    }
}
