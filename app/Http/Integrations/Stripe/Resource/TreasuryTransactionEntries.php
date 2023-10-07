<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryTransactionEntries\ListAllTransactionEntries;
use App\Http\Integrations\Stripe\Requests\TreasuryTransactionEntries\RetrieveTransactionEntry;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryTransactionEntries extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $financialAccount (Required) Returns objects associated with this FinancialAccount.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $transaction Only return TransactionEntries associated with this Transaction.
     */
    public function listAllTransactionEntries(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $effectiveAtgt,
        ?string $effectiveAtgte,
        ?string $effectiveAtlt,
        ?string $effectiveAtlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $financialAccount,
        ?string $limit,
        ?string $startingAfter,
        ?string $transaction,
    ): Response {
        return $this->connector->send(new ListAllTransactionEntries($createdgt, $createdgte, $createdlt, $createdlte, $effectiveAtgt, $effectiveAtgte, $effectiveAtlt, $effectiveAtlte, $endingBefore, $expand0, $expand1, $financialAccount, $limit, $startingAfter, $transaction));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveTransactionEntry(string $id, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveTransactionEntry($id, $expand0, $expand1));
    }
}
