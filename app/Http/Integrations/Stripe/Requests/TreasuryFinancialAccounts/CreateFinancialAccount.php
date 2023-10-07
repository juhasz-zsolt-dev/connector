<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a FinancialAccount
 */
class CreateFinancialAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/treasury/financial_accounts';
    }

    public function __construct()
    {
    }
}
