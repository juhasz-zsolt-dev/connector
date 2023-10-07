<?php

namespace App\Http\Integrations\PayPal\Requests\CatalogProducts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update product
 */
class UpdateProduct extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/v1/catalogs/products/{$this->productId}";
    }

    public function __construct(
        protected string $productId,
        protected ?array $values = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['values' => $this->values]);
    }
}
