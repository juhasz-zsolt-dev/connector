<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TerminalLocations\CreateLocation;
use App\Http\Integrations\Stripe\Requests\TerminalLocations\DeleteLocation;
use App\Http\Integrations\Stripe\Requests\TerminalLocations\ListAllLocations;
use App\Http\Integrations\Stripe\Requests\TerminalLocations\RetrieveLocation;
use App\Http\Integrations\Stripe\Requests\TerminalLocations\UpdateLocation;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TerminalLocations extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllLocations(
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllLocations($endingBefore, $expand0, $expand1, $limit, $startingAfter));
    }

    public function createLocation(): Response
    {
        return $this->connector->send(new CreateLocation());
    }

    public function deleteLocation(string $location): Response
    {
        return $this->connector->send(new DeleteLocation($location));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveLocation(string $location, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveLocation($location, $expand0, $expand1));
    }

    public function updateLocation(string $location): Response
    {
        return $this->connector->send(new UpdateLocation($location));
    }
}
