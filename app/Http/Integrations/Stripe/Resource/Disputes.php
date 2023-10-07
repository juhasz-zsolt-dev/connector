<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Disputes\CloseDispute;
use App\Http\Integrations\Stripe\Requests\Disputes\ListAllDisputes;
use App\Http\Integrations\Stripe\Requests\Disputes\RetrieveDispute;
use App\Http\Integrations\Stripe\Requests\Disputes\UpdateDispute;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Disputes extends Resource
{
    /**
     * @param  string  $charge Only return disputes associated to the charge specified by this charge ID.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $paymentIntent Only return disputes associated to the PaymentIntent specified by this PaymentIntent ID.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllDisputes(
        ?string $charge,
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $paymentIntent,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllDisputes($charge, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $paymentIntent, $startingAfter));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveDispute(string $dispute, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveDispute($dispute, $expand0, $expand1));
    }

    public function updateDispute(string $dispute): Response
    {
        return $this->connector->send(new UpdateDispute($dispute));
    }

    public function closeDispute(string $dispute): Response
    {
        return $this->connector->send(new CloseDispute($dispute));
    }
}
