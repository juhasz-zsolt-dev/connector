<?php

namespace App\Http\Integrations\PayPal\Requests\Plans;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show plan details
 */
class ShowPlanDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/billing/plans/{$this->billingPlanId}";
    }

    public function __construct(
        protected string $billingPlanId,
    ) {
    }
}
