<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Payouts\CancelPayout;
use App\Http\Integrations\Stripe\Requests\Payouts\CreatePayout;
use App\Http\Integrations\Stripe\Requests\Payouts\ListAllPayouts;
use App\Http\Integrations\Stripe\Requests\Payouts\RetrievePayout;
use App\Http\Integrations\Stripe\Requests\Payouts\ReversePayout;
use App\Http\Integrations\Stripe\Requests\Payouts\UpdatePayout;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Payouts extends Resource
{
    /**
     * @param  string  $destination The ID of an external account - only return payouts sent to this external account.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status Only return payouts that have the given status: `pending`, `paid`, `failed`, or `canceled`.
     */
    public function listAllPayouts(
        ?string $arrivalDategt,
        ?string $arrivalDategte,
        ?string $arrivalDatelt,
        ?string $arrivalDatelte,
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $destination,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
        ?string $status,
    ): Response {
        return $this->connector->send(new ListAllPayouts($arrivalDategt, $arrivalDategte, $arrivalDatelt, $arrivalDatelte, $createdgt, $createdgte, $createdlt, $createdlte, $destination, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $status));
    }

    public function createPayout(): Response
    {
        return $this->connector->send(new CreatePayout());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrievePayout(string $payout, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrievePayout($payout, $expand0, $expand1));
    }

    public function updatePayout(string $payout): Response
    {
        return $this->connector->send(new UpdatePayout($payout));
    }

    public function cancelPayout(string $payout): Response
    {
        return $this->connector->send(new CancelPayout($payout));
    }

    public function reversePayout(string $payout): Response
    {
        return $this->connector->send(new ReversePayout($payout));
    }
}
