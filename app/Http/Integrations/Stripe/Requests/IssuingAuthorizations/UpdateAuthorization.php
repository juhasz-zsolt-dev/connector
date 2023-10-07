<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingAuthorizations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update an authorization
 */
class UpdateAuthorization extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/issuing/authorizations/{$this->authorization}";
    }

    public function __construct(
        protected string $authorization,
    ) {
    }
}
