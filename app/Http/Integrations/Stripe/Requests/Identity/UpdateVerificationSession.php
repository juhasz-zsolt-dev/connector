<?php

namespace App\Http\Integrations\Stripe\Requests\Identity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a VerificationSession
 */
class UpdateVerificationSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/identity/verification_sessions/{$this->session}";
    }

    public function __construct(
        protected string $session,
    ) {
    }
}
