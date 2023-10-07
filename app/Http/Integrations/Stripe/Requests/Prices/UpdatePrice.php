<?php

namespace App\Http\Integrations\Stripe\Requests\Prices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a price
 */
class UpdatePrice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/prices/{$this->price}";
    }

    public function __construct(
        protected string $price,
    ) {
    }
}
