<?php

namespace App\Http\Integrations\PayPal\Requests\Payments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Void authorized payment
 */
class VoidAuthorizedPayment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/payments/authorizations/{$this->authorizationId}/void";
    }

    public function __construct(
        protected string $authorizationId,
    ) {
    }
}
