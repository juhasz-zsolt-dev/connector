<?php

namespace App\Http\Integrations\Billingo\Requests\Product;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetProduct
 *
 * Retrieves the details of an existing product.
 */
class GetProduct extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/products/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
