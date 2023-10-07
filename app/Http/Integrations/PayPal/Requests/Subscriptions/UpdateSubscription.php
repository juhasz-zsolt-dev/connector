<?php

namespace App\Http\Integrations\PayPal\Requests\Subscriptions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update subscription
 */
class UpdateSubscription extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/v1/billing/subscriptions/{$this->subscriptionId}";
    }

    public function __construct(
        protected string $subscriptionId,
        protected ?array $values = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['values' => $this->values]);
    }
}
