<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalConfigurations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a Configuration
 */
class UpdateConfiguration extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/terminal/configurations/{$this->configuration}";
    }

    public function __construct(
        protected string $configuration,
    ) {
    }
}
