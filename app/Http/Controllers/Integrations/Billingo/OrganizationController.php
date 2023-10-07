<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Resource\Organization;
use App\Persistence\Services\ApiKeyResolver;
use Saloon\Contracts\Connector;
use Saloon\Http\Response;

class OrganizationController extends Controller
{
    private Connector $connector;

    private Organization $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new Organization($this->connector);
    }

    public function getOrganizationData(): Response
    {
        return $this->resource->getOrganizationData();
    }
}
