<?php

namespace App\Http\Integrations\Stripe\Requests\Coupons;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a coupon
 */
class CreateCoupon extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/coupons';
    }

    public function __construct()
    {
    }
}
