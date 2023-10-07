<?php

namespace App\Http\Integrations\PayPal\Requests\CatalogProducts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show product details
 */
class ShowProductDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/catalogs/products/{$this->productId}";
    }

    public function __construct(
        protected string $productId,
    ) {
    }
}
