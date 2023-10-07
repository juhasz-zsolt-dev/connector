<?php

namespace App\Http\Integrations\PayPal\Requests\Plans;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create plan
 */
class CreatePlan extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/billing/plans';
    }

    public function __construct(
        protected mixed $productId = null,
        protected mixed $name = null,
        protected mixed $description = null,
        protected mixed $status = null,
        protected mixed $billingCycles = null,
        protected mixed $paymentPreferences = null,
        protected mixed $taxes = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'product_id' => $this->productId,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'billing_cycles' => $this->billingCycles,
            'payment_preferences' => $this->paymentPreferences,
            'taxes' => $this->taxes,
        ]);
    }
}
