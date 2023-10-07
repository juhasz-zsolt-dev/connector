<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all FinancialAccounts
 */
class ListAllFinancialAccounts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/treasury/financial_accounts';
    }

    /**
     * @param  null|string  $endingBefore An object ID cursor for use in pagination.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $limit A limit ranging from 1 to 100 (defaults to 10).
     * @param  null|string  $startingAfter An object ID cursor for use in pagination.
     */
    public function __construct(
        protected ?string $createdgt = null,
        protected ?string $createdgte = null,
        protected ?string $createdlt = null,
        protected ?string $createdlte = null,
        protected ?string $endingBefore = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $limit = null,
        protected ?string $startingAfter = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'created[gt]' => $this->createdgt,
            'created[gte]' => $this->createdgte,
            'created[lt]' => $this->createdlt,
            'created[lte]' => $this->createdlte,
            'ending_before' => $this->endingBefore,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'limit' => $this->limit,
            'starting_after' => $this->startingAfter,
        ]);
    }
}
