<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryCreditReversals\CreateCreditReversal;
use App\Http\Integrations\Stripe\Requests\TreasuryCreditReversals\ListAllCreditReversals;
use App\Http\Integrations\Stripe\Requests\TreasuryCreditReversals\RetrieveCreditReversal;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryCreditReversals extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $financialAccount (Required) Returns objects associated with this FinancialAccount.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $receivedCredit Only return CreditReversals for the ReceivedCredit ID.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status Only return CreditReversals for a given status.
     */
    public function listAllCreditReversals(
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $financialAccount,
        ?string $limit,
        ?string $receivedCredit,
        ?string $startingAfter,
        ?string $status,
    ): Response {
        return $this->connector->send(new ListAllCreditReversals($endingBefore, $expand0, $expand1, $financialAccount, $limit, $receivedCredit, $startingAfter, $status));
    }

    public function createCreditReversal(): Response
    {
        return $this->connector->send(new CreateCreditReversal());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveCreditReversal(string $creditReversal, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveCreditReversal($creditReversal, $expand0, $expand1));
    }
}
