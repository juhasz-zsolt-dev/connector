<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingCards;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all cards
 */
class ListAllCards extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/issuing/cards';
    }

    /**
     * @param  null|string  $cardholder Only return cards belonging to the Cardholder with the provided ID.
     * @param  null|string  $createdgt Only return cards that were issued during the given date interval.
     * @param  null|string  $createdgte Only return cards that were issued during the given date interval.
     * @param  null|string  $createdlt Only return cards that were issued during the given date interval.
     * @param  null|string  $createdlte Only return cards that were issued during the given date interval.
     * @param  null|string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  null|string  $expMonth Only return cards that have the given expiration month.
     * @param  null|string  $expYear Only return cards that have the given expiration year.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $last4 Only return cards that have the given last four digits.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  null|string  $status Only return cards that have the given status. One of `active`, `inactive`, or `canceled`.
     * @param  null|string  $type Only return cards that have the given type. One of `virtual` or `physical`.
     */
    public function __construct(
        protected ?string $cardholder = null,
        protected ?string $createdgt = null,
        protected ?string $createdgte = null,
        protected ?string $createdlt = null,
        protected ?string $createdlte = null,
        protected ?string $endingBefore = null,
        protected ?string $expMonth = null,
        protected ?string $expYear = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $last4 = null,
        protected ?string $limit = null,
        protected ?string $startingAfter = null,
        protected ?string $status = null,
        protected ?string $type = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'cardholder' => $this->cardholder,
            'created[gt]' => $this->createdgt,
            'created[gte]' => $this->createdgte,
            'created[lt]' => $this->createdlt,
            'created[lte]' => $this->createdlte,
            'ending_before' => $this->endingBefore,
            'exp_month' => $this->expMonth,
            'exp_year' => $this->expYear,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'last4' => $this->last4,
            'limit' => $this->limit,
            'starting_after' => $this->startingAfter,
            'status' => $this->status,
            'type' => $this->type,
        ]);
    }
}
