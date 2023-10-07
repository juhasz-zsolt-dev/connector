<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryCreditReversals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all CreditReversals
 */
class ListAllCreditReversals extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/treasury/credit_reversals';
    }

    /**
     * @param  null|string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $financialAccount (Required) Returns objects associated with this FinancialAccount.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $receivedCredit Only return CreditReversals for the ReceivedCredit ID.
     * @param  null|string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  null|string  $status Only return CreditReversals for a given status.
     */
    public function __construct(
        protected ?string $endingBefore = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $financialAccount = null,
        protected ?string $limit = null,
        protected ?string $receivedCredit = null,
        protected ?string $startingAfter = null,
        protected ?string $status = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'ending_before' => $this->endingBefore,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'financial_account' => $this->financialAccount,
            'limit' => $this->limit,
            'received_credit' => $this->receivedCredit,
            'starting_after' => $this->startingAfter,
            'status' => $this->status,
        ]);
    }
}
