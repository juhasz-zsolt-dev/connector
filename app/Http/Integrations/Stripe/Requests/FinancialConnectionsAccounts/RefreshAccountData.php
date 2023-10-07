<?php

namespace App\Http\Integrations\Stripe\Requests\FinancialConnectionsAccounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Refresh Account data
 */
class RefreshAccountData extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/financial_connections/accounts/{$this->account}/refresh";
    }

    public function __construct(
        protected string $account,
    ) {
    }
}
