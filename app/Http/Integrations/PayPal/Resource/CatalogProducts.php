<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\CatalogProducts\CreateProduct;
use App\Http\Integrations\PayPal\Requests\CatalogProducts\ListProducts;
use App\Http\Integrations\PayPal\Requests\CatalogProducts\ShowProductDetails;
use App\Http\Integrations\PayPal\Requests\CatalogProducts\UpdateProduct;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class CatalogProducts extends Resource
{
    public function createProduct(
        mixed $name,
        mixed $type,
        mixed $id,
        mixed $description,
        mixed $category,
        mixed $imageUrl,
        mixed $homeUrl,
    ): Response {
        return $this->connector->send(new CreateProduct($name, $type, $id, $description, $category, $imageUrl, $homeUrl));
    }

    /**
     * @param  string  $pageSize The number of items to return in the response.
     * @param  string  $page A non-zero integer which is the start index of the entire list of items that are returned in the response. So, the combination of `page=1` and `page_size=20` returns the first 20 items. The combination of `page=2` and `page_size=20` returns the next 20 items.
     * @param  string  $totalRequired Indicates whether to show the total items and total pages in the response.
     */
    public function listProducts(?string $pageSize, ?string $page, ?string $totalRequired): Response
    {
        return $this->connector->send(new ListProducts($pageSize, $page, $totalRequired));
    }

    public function showProductDetails(string $productId): Response
    {
        return $this->connector->send(new ShowProductDetails($productId));
    }

    public function updateProduct(string $productId, ?array $values): Response
    {
        return $this->connector->send(new UpdateProduct($productId, $values));
    }
}
