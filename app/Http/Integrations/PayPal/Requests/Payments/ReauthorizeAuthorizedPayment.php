<?php

namespace App\Http\Integrations\PayPal\Requests\Payments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Reauthorize authorized payment
 */
class ReauthorizeAuthorizedPayment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/payments/authorizations/{$this->authorizationId}/reauthorize";
    }

    public function __construct(
        protected string $authorizationId,
        protected mixed $amount = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['amount' => $this->amount]);
    }
}
