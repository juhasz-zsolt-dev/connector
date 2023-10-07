<?php

namespace App\Http\Integrations\Stripe\Requests\PromotionCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrieve a promotion code
 */
class RetrievePromotionCode extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/promotion_codes/{$this->promotionCode}";
    }

    /**
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function __construct(
        protected string $promotionCode,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['expand[0]' => $this->expand0, 'expand[1]' => $this->expand1]);
    }
}
