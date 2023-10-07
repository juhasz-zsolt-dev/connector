<?php

namespace App\Http\Integrations\Billingo\Requests\Product;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProduct
 *
 * Returns a list of your products. The partners are returned sorted by creation date, with the most
 * recent partners appearing first.
 */
class ListProduct extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/products';
    }

    public function __construct(
        protected ?int $page = null,
        protected ?string $productQuery = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'query' => $this->productQuery]);
    }
}
