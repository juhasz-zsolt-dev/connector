<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Organization\GetOrganizationData;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class Organization extends Resource
{
    public function getOrganizationData(): Response
    {
        return $this->connector->send(new GetOrganizationData());
    }
}
