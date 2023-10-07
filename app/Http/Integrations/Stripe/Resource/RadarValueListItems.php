<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\RadarValueListItems\CreateValueListItem;
use App\Http\Integrations\Stripe\Requests\RadarValueListItems\DeleteValueListItem;
use App\Http\Integrations\Stripe\Requests\RadarValueListItems\ListAllValueListItems;
use App\Http\Integrations\Stripe\Requests\RadarValueListItems\RetrieveValueListItem;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class RadarValueListItems extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $value Return items belonging to the parent list whose value matches the specified value (using an "is like" match).
     * @param  string  $valueList (Required) Identifier for the parent value list this item belongs to.
     */
    public function listAllValueListItems(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
        ?string $value,
        ?string $valueList,
    ): Response {
        return $this->connector->send(new ListAllValueListItems($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $value, $valueList));
    }

    public function createValueListItem(): Response
    {
        return $this->connector->send(new CreateValueListItem());
    }

    public function deleteValueListItem(string $item): Response
    {
        return $this->connector->send(new DeleteValueListItem($item));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveValueListItem(string $item, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveValueListItem($item, $expand0, $expand1));
    }
}
