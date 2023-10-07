<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Partner\CreatePartner;
use App\Http\Integrations\Billingo\Requests\Partner\DeletePartner;
use App\Http\Integrations\Billingo\Requests\Partner\GetPartner;
use App\Http\Integrations\Billingo\Requests\Partner\ListPartner;
use App\Http\Integrations\Billingo\Requests\Partner\UpdatePartner;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class Partner extends Resource
{
    public function listPartner(?int $page, ?string $query): Response
    {
        return $this->connector->send(new ListPartner($page, $query));
    }

    public function createPartner(): Response
    {
        return $this->connector->send(new CreatePartner());
    }

    public function getPartner(int $id): Response
    {
        return $this->connector->send(new GetPartner($id));
    }

    public function updatePartner(int $id): Response
    {
        return $this->connector->send(new UpdatePartner($id));
    }

    public function deletePartner(int $id): Response
    {
        return $this->connector->send(new DeletePartner($id));
    }
}
