<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingDisputes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Submit a dispute
 */
class SubmitDispute extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/issuing/disputes/{$this->dispute}/submit";
    }

    public function __construct(
        protected string $dispute,
    ) {
    }
}
