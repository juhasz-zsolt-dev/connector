<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Files\CreateFile;
use App\Http\Integrations\Stripe\Requests\Files\ListAllFiles;
use App\Http\Integrations\Stripe\Requests\Files\RetrieveFile;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Files extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $purpose The file purpose to filter queries by. If none is provided, files will not be filtered by purpose.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllFiles(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $purpose,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllFiles($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $purpose, $startingAfter));
    }

    public function createFile(): Response
    {
        return $this->connector->send(new CreateFile());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveFile(string $file, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveFile($file, $expand0, $expand1));
    }
}
