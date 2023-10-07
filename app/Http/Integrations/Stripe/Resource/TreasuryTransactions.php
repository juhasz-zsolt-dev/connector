<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryTransactions\ListAllTransactions;
use App\Http\Integrations\Stripe\Requests\TreasuryTransactions\RetrieveTransaction;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryTransactions extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $financialAccount (Required) Returns objects associated with this FinancialAccount.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status Only return Transactions that have the given status: `open`, `posted`, or `void`.
     * @param  string  $statusTransitionspostedAtgt A filter for the `status_transitions.posted_at` timestamp. When using this filter, `status=posted` and `order_by=posted_at` must also be specified.
     * @param  string  $statusTransitionspostedAtgte A filter for the `status_transitions.posted_at` timestamp. When using this filter, `status=posted` and `order_by=posted_at` must also be specified.
     * @param  string  $statusTransitionspostedAtlt A filter for the `status_transitions.posted_at` timestamp. When using this filter, `status=posted` and `order_by=posted_at` must also be specified.
     * @param  string  $statusTransitionspostedAtlte A filter for the `status_transitions.posted_at` timestamp. When using this filter, `status=posted` and `order_by=posted_at` must also be specified.
     */
    public function listAllTransactions(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $financialAccount,
        ?string $limit,
        ?string $startingAfter,
        ?string $status,
        ?string $statusTransitionspostedAtgt,
        ?string $statusTransitionspostedAtgte,
        ?string $statusTransitionspostedAtlt,
        ?string $statusTransitionspostedAtlte,
    ): Response {
        return $this->connector->send(new ListAllTransactions($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $financialAccount, $limit, $startingAfter, $status, $statusTransitionspostedAtgt, $statusTransitionspostedAtgte, $statusTransitionspostedAtlt, $statusTransitionspostedAtlte));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveTransaction(string $id, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveTransaction($id, $expand0, $expand1));
    }
}
