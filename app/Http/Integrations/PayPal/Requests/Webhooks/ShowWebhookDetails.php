<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show webhook details
 */
class ShowWebhookDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/notifications/webhooks/{$this->webhookId}";
    }

    public function __construct(
        protected string $webhookId,
    ) {
    }
}
