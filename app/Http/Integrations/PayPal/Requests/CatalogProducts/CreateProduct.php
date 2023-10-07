<?php

namespace App\Http\Integrations\PayPal\Requests\CatalogProducts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create product
 */
class CreateProduct extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/catalogs/products';
    }

    public function __construct(
        protected mixed $name = null,
        protected mixed $type = null,
        protected mixed $id = null,
        protected mixed $description = null,
        protected mixed $category = null,
        protected mixed $imageUrl = null,
        protected mixed $homeUrl = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'type' => $this->type,
            'id' => $this->id,
            'description' => $this->description,
            'category' => $this->category,
            'image_url' => $this->imageUrl,
            'home_url' => $this->homeUrl,
        ]);
    }
}
