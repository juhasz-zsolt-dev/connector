<?php

namespace App\Http\Integrations\PayPal\Requests\Plans;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Deactivate plan
 */
class DeactivatePlan extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/billing/plans/{$this->billingPlanId}/deactivate";
    }

    public function __construct(
        protected string $billingPlanId,
    ) {
    }
}
