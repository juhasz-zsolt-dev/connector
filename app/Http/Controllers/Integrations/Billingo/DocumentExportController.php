<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Resource\DocumentExport;
use App\Persistence\Services\ApiKeyResolver;
use Illuminate\Http\Request;
use Saloon\Contracts\Connector;

class DocumentExportController extends Controller
{
    private Connector $connector;

    private DocumentExport $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new DocumentExport($this->connector);
    }

    public function create()
    {
        return $this->resource->create();
    }

    public function download(Request $request)
    {
        return $this->resource->download($request->route('id'));
    }

    public function poll(Request $request)
    {
        return $this->resource->poll($request->route('id'));
    }
}
