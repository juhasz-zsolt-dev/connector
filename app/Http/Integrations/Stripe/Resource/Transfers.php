<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Transfers\CreateTransfer;
use App\Http\Integrations\Stripe\Requests\Transfers\ListAllTransfers;
use App\Http\Integrations\Stripe\Requests\Transfers\RetrieveTransfer;
use App\Http\Integrations\Stripe\Requests\Transfers\UpdateTransfer;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Transfers extends Resource
{
    /**
     * @param  string  $destination Only return transfers for the destination specified by this account ID.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $transferGroup Only return transfers with the specified transfer group.
     */
    public function listAllTransfers(
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
        ?string $transferGroup,
    ): Response {
        return $this->connector->send(new ListAllTransfers($createdgt, $createdgte, $createdlt, $createdlte, $destination, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $transferGroup));
    }

    public function createTransfer(): Response
    {
        return $this->connector->send(new CreateTransfer());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveTransfer(string $transfer, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveTransfer($transfer, $expand0, $expand1));
    }

    public function updateTransfer(string $transfer): Response
    {
        return $this->connector->send(new UpdateTransfer($transfer));
    }
}
