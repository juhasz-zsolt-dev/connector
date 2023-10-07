<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\DocumentExport\Create;
use App\Http\Integrations\Billingo\Requests\DocumentExport\Download;
use App\Http\Integrations\Billingo\Requests\DocumentExport\Poll;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class DocumentExport extends Resource
{
    public function create(): Response
    {
        return $this->connector->send(new Create());
    }

    /**
     * @param  string  $id The ID from create document export endpoint.
     */
    public function download(string $id): Response
    {
        return $this->connector->send(new Download($id));
    }

    /**
     * @param  string  $id The ID from create document export endpoint.
     */
    public function poll(string $id): Response
    {
        return $this->connector->send(new Poll($id));
    }
}
