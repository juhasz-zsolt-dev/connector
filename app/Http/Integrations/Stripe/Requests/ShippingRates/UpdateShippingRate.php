<?php

namespace App\Http\Integrations\Stripe\Requests\ShippingRates;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a shipping rate
 */
class UpdateShippingRate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/shipping_rates/{$this->shippingRateToken}";
    }

    public function __construct(
        protected string $shippingRateToken,
    ) {
    }
}
