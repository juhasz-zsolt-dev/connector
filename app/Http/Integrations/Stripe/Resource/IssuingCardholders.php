<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\IssuingCardholders\CreateCardholder;
use App\Http\Integrations\Stripe\Requests\IssuingCardholders\ListAllCardholders;
use App\Http\Integrations\Stripe\Requests\IssuingCardholders\RetrieveCardholder;
use App\Http\Integrations\Stripe\Requests\IssuingCardholders\UpdateCardholder;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class IssuingCardholders extends Resource
{
    /**
     * @param  string  $createdgt Only return cardholders that were created during the given date interval.
     * @param  string  $createdgte Only return cardholders that were created during the given date interval.
     * @param  string  $createdlt Only return cardholders that were created during the given date interval.
     * @param  string  $createdlte Only return cardholders that were created during the given date interval.
     * @param  string  $email Only return cardholders that have the given email address.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $phoneNumber Only return cardholders that have the given phone number.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status Only return cardholders that have the given status. One of `active`, `inactive`, or `blocked`.
     * @param  string  $type Only return cardholders that have the given type. One of `individual` or `company`.
     */
    public function listAllCardholders(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $email,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $phoneNumber,
        ?string $startingAfter,
        ?string $status,
        ?string $type,
    ): Response {
        return $this->connector->send(new ListAllCardholders($createdgt, $createdgte, $createdlt, $createdlte, $email, $endingBefore, $expand0, $expand1, $limit, $phoneNumber, $startingAfter, $status, $type));
    }

    public function createCardholder(): Response
    {
        return $this->connector->send(new CreateCardholder());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveCardholder(string $cardholder, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveCardholder($cardholder, $expand0, $expand1));
    }

    public function updateCardholder(string $cardholder): Response
    {
        return $this->connector->send(new UpdateCardholder($cardholder));
    }
}
