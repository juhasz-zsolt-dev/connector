<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\IssuingCards\CreateCard;
use App\Http\Integrations\Stripe\Requests\IssuingCards\FailTestmodeCard;
use App\Http\Integrations\Stripe\Requests\IssuingCards\ListAllCards;
use App\Http\Integrations\Stripe\Requests\IssuingCards\RetrieveCard;
use App\Http\Integrations\Stripe\Requests\IssuingCards\ReturnTestmodeCard;
use App\Http\Integrations\Stripe\Requests\IssuingCards\ShipTestmodeCard;
use App\Http\Integrations\Stripe\Requests\IssuingCards\UpdateCard;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class IssuingCards extends Resource
{
    /**
     * @param  string  $cardholder Only return cards belonging to the Cardholder with the provided ID.
     * @param  string  $createdgt Only return cards that were issued during the given date interval.
     * @param  string  $createdgte Only return cards that were issued during the given date interval.
     * @param  string  $createdlt Only return cards that were issued during the given date interval.
     * @param  string  $createdlte Only return cards that were issued during the given date interval.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expMonth Only return cards that have the given expiration month.
     * @param  string  $expYear Only return cards that have the given expiration year.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $last4 Only return cards that have the given last four digits.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status Only return cards that have the given status. One of `active`, `inactive`, or `canceled`.
     * @param  string  $type Only return cards that have the given type. One of `virtual` or `physical`.
     */
    public function listAllCards(
        ?string $cardholder,
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expMonth,
        ?string $expYear,
        ?string $expand0,
        ?string $expand1,
        ?string $last4,
        ?string $limit,
        ?string $startingAfter,
        ?string $status,
        ?string $type,
    ): Response {
        return $this->connector->send(new ListAllCards($cardholder, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expMonth, $expYear, $expand0, $expand1, $last4, $limit, $startingAfter, $status, $type));
    }

    public function createCard(): Response
    {
        return $this->connector->send(new CreateCard());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveCard(string $card, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveCard($card, $expand0, $expand1));
    }

    public function updateCard(string $card): Response
    {
        return $this->connector->send(new UpdateCard($card));
    }

    public function failTestmodeCard(string $card): Response
    {
        return $this->connector->send(new FailTestmodeCard($card));
    }

    public function returnTestmodeCard(string $card): Response
    {
        return $this->connector->send(new ReturnTestmodeCard($card));
    }

    public function shipTestmodeCard(string $card): Response
    {
        return $this->connector->send(new ShipTestmodeCard($card));
    }
}
