<?php

namespace App\Http\Integrations\Stripe\Requests\Accounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a login link
 */
class CreateLoginLink extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/accounts/{$this->account}/login_links";
    }

    public function __construct(
        protected string $account,
    ) {
    }
}
