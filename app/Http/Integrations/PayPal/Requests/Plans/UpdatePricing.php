<?php

namespace App\Http\Integrations\PayPal\Requests\Plans;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update pricing
 */
class UpdatePricing extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/billing/plans/{$this->billingPlanId}/update-pricing-schemes";
    }

    public function __construct(
        protected string $billingPlanId,
        protected mixed $pricingSchemes = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['pricing_schemes' => $this->pricingSchemes]);
    }
}
