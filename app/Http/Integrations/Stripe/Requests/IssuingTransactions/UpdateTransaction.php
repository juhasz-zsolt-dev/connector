<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingTransactions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a transaction
 */
class UpdateTransaction extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/issuing/transactions/{$this->transaction}";
    }

    public function __construct(
        protected string $transaction,
    ) {
    }
}
