<?php

namespace App\Http\Integrations\PayPal\Requests\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create order
 */
class CreateOrder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v2/checkout/orders';
    }

    public function __construct(
        protected mixed $intent = null,
        protected mixed $purchaseUnits = null,
        protected mixed $applicationContext = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'intent' => $this->intent,
            'purchase_units' => $this->purchaseUnits,
            'application_context' => $this->applicationContext,
        ]);
    }
}
