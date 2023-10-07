<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Resource\Product;
use App\Persistence\Services\ApiKeyResolver;
use Illuminate\Http\Request;
use Saloon\Contracts\Connector;
use Saloon\Http\Response;

class ProductController extends Controller
{
    private Connector $connector;

    private Product $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new Product($this->connector);
    }

    public function createProduct(): Response
    {
        return $this->resource->createProduct();
    }

    public function deleteProduct(Request $request): Response
    {
        return $this->resource->deleteProduct($request->route('id'));
    }

    public function getProduct(Request $request): Response
    {
        return $this->resource->getProduct($request->route('id'));
    }

    public function listProduct(Request $request): Response
    {
        return $this->resource->listProduct($request->get('page'), $request->get('query'));
    }

    public function updateProduct(Request $request): Response
    {
        return $this->resource->updateProduct($request->route('id'));
    }
}
