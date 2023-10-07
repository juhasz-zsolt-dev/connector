<?php

namespace App\Http\Integrations\Stripe\Requests\WebhookEndpoints;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a webhook endpoint
 */
class DeleteWebhookEndpoint extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/webhook_endpoints/{$this->webhookEndpoint}";
    }

    public function __construct(
        protected string $webhookEndpoint,
    ) {
    }
}
