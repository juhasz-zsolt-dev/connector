<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryReceivedDebits\ListAllReceivedDebits;
use App\Http\Integrations\Stripe\Requests\TreasuryReceivedDebits\RetrieveReceivedDebit;
use App\Http\Integrations\Stripe\Requests\TreasuryReceivedDebits\TestModeCreateReceivedDebit;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryReceivedDebits extends Resource
{
    public function testModeCreateReceivedDebit(): Response
    {
        return $this->connector->send(new TestModeCreateReceivedDebit());
    }

    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $financialAccount (Required) The FinancialAccount that funds were pulled from.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status Only return ReceivedDebits that have the given status: `succeeded` or `failed`.
     */
    public function listAllReceivedDebits(
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $financialAccount,
        ?string $limit,
        ?string $startingAfter,
        ?string $status,
    ): Response {
        return $this->connector->send(new ListAllReceivedDebits($endingBefore, $expand0, $expand1, $financialAccount, $limit, $startingAfter, $status));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveReceivedDebit(string $id, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveReceivedDebit($id, $expand0, $expand1));
    }
}
