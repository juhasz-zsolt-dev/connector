<?php

namespace App\Http\Integrations\PayPal\Requests\Subscriptions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Revise plan or quantity of subscription
 */
class RevisePlanOrQuantityOfSubscription extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/billing/subscriptions/{$this->subscriptionId}/revise";
    }

    public function __construct(
        protected string $subscriptionId,
        protected mixed $planId = null,
        protected mixed $shippingAmount = null,
        protected mixed $shippingAddress = null,
        protected mixed $applicationContext = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'plan_id' => $this->planId,
            'shipping_amount' => $this->shippingAmount,
            'shipping_address' => $this->shippingAddress,
            'application_context' => $this->applicationContext,
        ]);
    }
}
