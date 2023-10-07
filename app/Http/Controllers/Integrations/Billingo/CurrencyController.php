<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Resource\Currency;
use App\Persistence\Services\ApiKeyResolver;
use Illuminate\Http\Request;
use Saloon\Contracts\Connector;
use Saloon\Http\Response;

class CurrencyController extends Controller
{
    private Connector $connector;

    private Currency $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new Currency($this->connector);
    }

    public function getConversionRate(Request $request): Response
    {
        return $this->resource->getConversionRate($request->get('from'), $request->get('to'), $request->get('date'));
    }
}
