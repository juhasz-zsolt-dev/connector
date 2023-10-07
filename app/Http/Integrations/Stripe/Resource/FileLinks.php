<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\FileLinks\CreateFileLink;
use App\Http\Integrations\Stripe\Requests\FileLinks\ListAllFileLinks;
use App\Http\Integrations\Stripe\Requests\FileLinks\RetrieveFileLink;
use App\Http\Integrations\Stripe\Requests\FileLinks\UpdateFileLink;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class FileLinks extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $expired Filter links by their expiration status. By default, all links are returned.
     * @param  string  $file Only return links for the given file.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllFileLinks(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $expired,
        ?string $file,
        ?string $limit,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllFileLinks($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $expired, $file, $limit, $startingAfter));
    }

    public function createFileLink(): Response
    {
        return $this->connector->send(new CreateFileLink());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveFileLink(string $link, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveFileLink($link, $expand0, $expand1));
    }

    public function updateFileLink(string $link): Response
    {
        return $this->connector->send(new UpdateFileLink($link));
    }
}
