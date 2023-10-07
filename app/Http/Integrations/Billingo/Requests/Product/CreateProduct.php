<?php

namespace App\Http\Integrations\Billingo\Requests\Product;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateProduct
 *
 * Create a new product. Returns a product object if the create is succeded.
 */
class CreateProduct extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/products';
    }

    public function __construct()
    {
    }
}
