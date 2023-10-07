<?php

namespace App\Http\Integrations\Stripe\Requests\Products;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a product
 */
class DeleteProduct extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/products/{$this->id}";
    }

    public function __construct(
        protected string $id,
    ) {
    }
}
