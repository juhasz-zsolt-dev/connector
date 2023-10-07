<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryDebitReversals\CreateDebitReversal;
use App\Http\Integrations\Stripe\Requests\TreasuryDebitReversals\ListAllDebitReversals;
use App\Http\Integrations\Stripe\Requests\TreasuryDebitReversals\RetrieveDebitReversal;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryDebitReversals extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $financialAccount (Required) Returns objects associated with this FinancialAccount.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $receivedDebit Only return DebitReversals for the ReceivedDebit ID.
     * @param  string  $resolution Only return DebitReversals for a given resolution.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status Only return DebitReversals for a given status.
     */
    public function listAllDebitReversals(
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $financialAccount,
        ?string $limit,
        ?string $receivedDebit,
        ?string $resolution,
        ?string $startingAfter,
        ?string $status,
    ): Response {
        return $this->connector->send(new ListAllDebitReversals($endingBefore, $expand0, $expand1, $financialAccount, $limit, $receivedDebit, $resolution, $startingAfter, $status));
    }

    public function createDebitReversal(): Response
    {
        return $this->connector->send(new CreateDebitReversal());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveDebitReversal(string $debitReversal, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveDebitReversal($debitReversal, $expand0, $expand1));
    }
}
