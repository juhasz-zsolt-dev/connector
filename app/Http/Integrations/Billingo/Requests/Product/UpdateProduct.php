<?php

namespace App\Http\Integrations\Billingo\Requests\Product;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateProduct
 *
 * Update an existing product. Returns a product object if the update is succeded.
 */
class UpdateProduct extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/products/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
