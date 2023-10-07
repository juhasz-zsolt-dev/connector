<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List available events
 */
class ListAvailableEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/notifications/webhooks-event-types';
    }

    public function __construct()
    {
    }
}
