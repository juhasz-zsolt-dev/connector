<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Verify webhook signature
 */
class VerifyWebhookSignature extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/notifications/verify-webhook-signature';
    }

    public function __construct()
    {
    }
}
