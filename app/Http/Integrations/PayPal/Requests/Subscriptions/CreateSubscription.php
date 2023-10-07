<?php

namespace App\Http\Integrations\PayPal\Requests\Subscriptions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create subscription
 */
class CreateSubscription extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/billing/subscriptions';
    }

    public function __construct(
        protected mixed $planId = null,
        protected mixed $startTime = null,
        protected mixed $shippingAmount = null,
        protected mixed $subscriber = null,
        protected mixed $applicationContext = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'plan_id' => $this->planId,
            'start_time' => $this->startTime,
            'shipping_amount' => $this->shippingAmount,
            'subscriber' => $this->subscriber,
            'application_context' => $this->applicationContext,
        ]);
    }
}
