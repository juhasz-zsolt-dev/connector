<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List event subscriptions for webhook
 */
class ListEventSubscriptionsForWebhook extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/notifications/webhooks/{$this->webhookId}/event-types";
    }

    public function __construct(
        protected string $webhookId,
    ) {
    }
}
