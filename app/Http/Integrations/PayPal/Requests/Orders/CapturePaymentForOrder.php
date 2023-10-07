<?php

namespace App\Http\Integrations\PayPal\Requests\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Capture payment for order
 */
class CapturePaymentForOrder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/checkout/orders/{$this->orderId}/capture";
    }

    public function __construct(
        protected string $orderId,
    ) {
    }
}
