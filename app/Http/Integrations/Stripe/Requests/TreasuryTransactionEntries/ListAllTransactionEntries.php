<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryTransactionEntries;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all TransactionEntries
 */
class ListAllTransactionEntries extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/treasury/transaction_entries';
    }

    /**
     * @param  null|string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $financialAccount (Required) Returns objects associated with this FinancialAccount.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  null|string  $transaction Only return TransactionEntries associated with this Transaction.
     */
    public function __construct(
        protected ?string $createdgt = null,
        protected ?string $createdgte = null,
        protected ?string $createdlt = null,
        protected ?string $createdlte = null,
        protected ?string $effectiveAtgt = null,
        protected ?string $effectiveAtgte = null,
        protected ?string $effectiveAtlt = null,
        protected ?string $effectiveAtlte = null,
        protected ?string $endingBefore = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $financialAccount = null,
        protected ?string $limit = null,
        protected ?string $startingAfter = null,
        protected ?string $transaction = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'created[gt]' => $this->createdgt,
            'created[gte]' => $this->createdgte,
            'created[lt]' => $this->createdlt,
            'created[lte]' => $this->createdlte,
            'effective_at[gt]' => $this->effectiveAtgt,
            'effective_at[gte]' => $this->effectiveAtgte,
            'effective_at[lt]' => $this->effectiveAtlt,
            'effective_at[lte]' => $this->effectiveAtlte,
            'ending_before' => $this->endingBefore,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'financial_account' => $this->financialAccount,
            'limit' => $this->limit,
            'starting_after' => $this->startingAfter,
            'transaction' => $this->transaction,
        ]);
    }
}
