<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccountFeatures;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update FinancialAccount Features
 */
class UpdateFinancialAccountFeatures extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/treasury/financial_accounts/{$this->financialAccount}/features";
    }

    public function __construct(
        protected string $financialAccount,
    ) {
    }
}
