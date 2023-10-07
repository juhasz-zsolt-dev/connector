<?php

namespace App\Http\Integrations\Billingo\Requests\Product;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteProduct
 *
 * Delete an existing product.
 */
class DeleteProduct extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/products/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
