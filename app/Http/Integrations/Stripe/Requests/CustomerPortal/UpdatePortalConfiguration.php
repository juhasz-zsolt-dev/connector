<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerPortal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a portal configuration
 */
class UpdatePortalConfiguration extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/billing_portal/configurations/{$this->configuration}";
    }

    public function __construct(
        protected string $configuration,
    ) {
    }
}
