<?php

namespace App\Http\Integrations\Stripe\Requests\PromotionCodes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a promotion code
 */
class UpdatePromotionCode extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/promotion_codes/{$this->promotionCode}";
    }

    public function __construct(
        protected string $promotionCode,
    ) {
    }
}
