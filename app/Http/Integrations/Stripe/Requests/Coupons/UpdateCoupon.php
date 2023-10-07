<?php

namespace App\Http\Integrations\Stripe\Requests\Coupons;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a coupon
 */
class UpdateCoupon extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/coupons/{$this->coupon}";
    }

    public function __construct(
        protected string $coupon,
    ) {
    }
}
