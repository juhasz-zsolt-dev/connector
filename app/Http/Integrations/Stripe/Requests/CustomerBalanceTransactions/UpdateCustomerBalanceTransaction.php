<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerBalanceTransactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a customer balance transaction
 */
class UpdateCustomerBalanceTransaction extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/customers/{$this->customer}/balance_transactions/{$this->transaction}";
    }

    public function __construct(
        protected string $customer,
        protected string $transaction,
    ) {
    }
}
