<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Resource\Util;
use App\Persistence\Services\ApiKeyResolver;
use Illuminate\Http\Request;
use Saloon\Http\Connector;

class UtilController extends Controller
{
    private Connector $connector;

    private Util $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new Util(connector: $this->connector);
    }

    public function checkTaxNumber(Request $request)
    {
        return $this->resource->checkTaxNumber($request->route('tax_number'));
    }

    public function convertLegacyId(Request $request)
    {
        return $this->resource->convertLegacyId($request->route('id'));
    }

    public function getServerTime()
    {
        return $this->resource->getServerTime();
    }
}
