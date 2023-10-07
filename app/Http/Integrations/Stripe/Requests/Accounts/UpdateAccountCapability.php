<?php

namespace App\Http\Integrations\Stripe\Requests\Accounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update an account capability
 */
class UpdateAccountCapability extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/accounts/{$this->account}/capabilities/{$this->capability}";
    }

    public function __construct(
        protected string $account,
        protected string $capability,
    ) {
    }
}
