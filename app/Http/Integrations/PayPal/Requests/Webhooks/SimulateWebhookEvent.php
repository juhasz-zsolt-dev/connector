<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Simulate webhook event
 */
class SimulateWebhookEvent extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/notifications/simulate-event';
    }

    public function __construct(
        protected mixed $eventType = null,
        protected mixed $webhookId = null,
        protected mixed $url = null,
        protected mixed $resourceVersion = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'event_type' => $this->eventType,
            'webhook_id' => $this->webhookId,
            'url' => $this->url,
            'resource_version' => $this->resourceVersion,
        ]);
    }
}
