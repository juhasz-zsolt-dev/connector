<?php

namespace App\Http\Integrations\Stripe\Requests\SubscriptionItems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a usage record
 */
class CreateUsageRecord extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/subscription_items/{$this->subscriptionItem}/usage_records";
    }

    public function __construct(
        protected string $subscriptionItem,
    ) {
    }
}
