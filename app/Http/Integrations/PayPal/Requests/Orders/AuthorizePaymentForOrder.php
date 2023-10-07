<?php

namespace App\Http\Integrations\PayPal\Requests\Orders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Authorize payment for order
 */
class AuthorizePaymentForOrder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v2/checkout/orders/{$this->orderId}/authorize";
    }

    public function __construct(
        protected string $orderId,
    ) {
    }
}
