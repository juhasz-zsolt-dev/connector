<?php

namespace App\Http\Integrations\Stripe\Requests\ShippingRates;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrieve a shipping rate
 */
class RetrieveShippingRate extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/shipping_rates/{$this->shippingRateToken}";
    }

    /**
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function __construct(
        protected string $shippingRateToken,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['expand[0]' => $this->expand0, 'expand[1]' => $this->expand1]);
    }
}
