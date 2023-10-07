<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Resource\Spending;
use App\Persistence\Services\ApiKeyResolver;
use Illuminate\Http\Request;
use Saloon\Contracts\Connector;
use Saloon\Http\Response;

class SpendingController extends Controller
{
    private Connector $connector;

    private Spending $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new Spending($this->connector);
    }

    public function spendingSave(): Response
    {
        return $this->resource->spendingSave();
    }

    public function spendingList(Request $request): Response
    {
        return $this->resource->spendingList($request->get('q'), $request->get('page'), $request->get('spending_date'), $request->get('start_date'), $request->get('end_date'), $request->get('payment_status'), $request->get('spending_type'), $request->get('categories'), $request->get('currencies'), $request->get('payment_methods'));
    }

    public function spendingShow(Request $request): Response
    {
        return $this->resource->spendingShow($request->get('id'));
    }

    public function spendingUpdate(Request $request): Response
    {
        return $this->resource->spendingUpdate($request->get('id'));
    }

    public function spendingDelete(Request $request): Response
    {
        return $this->resource->spendingDelete($request->get('id'));
    }
}
