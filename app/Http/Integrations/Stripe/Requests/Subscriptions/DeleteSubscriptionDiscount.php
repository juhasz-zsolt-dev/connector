<?php

namespace App\Http\Integrations\Stripe\Requests\Subscriptions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a subscription discount
 */
class DeleteSubscriptionDiscount extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/subscriptions/{$this->subscriptionExposedId}/discount";
    }

    public function __construct(
        protected string $subscriptionExposedId,
    ) {
    }
}
