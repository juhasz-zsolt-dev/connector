<?php

namespace App\Http\Integrations\Stripe\Requests\Identity;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Redact a VerificationSession
 */
class RedactVerificationSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/identity/verification_sessions/{$this->session}/redact";
    }

    public function __construct(
        protected string $session,
    ) {
    }
}
