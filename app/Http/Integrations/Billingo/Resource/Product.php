<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Product\CreateProduct;
use App\Http\Integrations\Billingo\Requests\Product\DeleteProduct;
use App\Http\Integrations\Billingo\Requests\Product\GetProduct;
use App\Http\Integrations\Billingo\Requests\Product\ListProduct;
use App\Http\Integrations\Billingo\Requests\Product\UpdateProduct;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class Product extends Resource
{
    public function listProduct(?int $page, ?string $query): Response
    {
        return $this->connector->send(new ListProduct($page, $query));
    }

    public function createProduct(): Response
    {
        return $this->connector->send(new CreateProduct());
    }

    public function getProduct(int $id): Response
    {
        return $this->connector->send(new GetProduct($id));
    }

    public function updateProduct(int $id): Response
    {
        return $this->connector->send(new UpdateProduct($id));
    }

    public function deleteProduct(int $id): Response
    {
        return $this->connector->send(new DeleteProduct($id));
    }
}
