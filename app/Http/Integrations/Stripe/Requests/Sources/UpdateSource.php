<?php

namespace App\Http\Integrations\Stripe\Requests\Sources;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a source
 */
class UpdateSource extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/sources/{$this->source}";
    }

    public function __construct(
        protected string $source,
    ) {
    }
}
