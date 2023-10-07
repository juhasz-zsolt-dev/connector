<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List webhooks
 */
class ListWebhooks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/notifications/webhooks';
    }

    /**
     * @param  null|string  $anchorType Filters the webhooks in the response by an `anchor_id` entity type.
     * @param  null|string  $anchorType Filters the webhooks in the response by an `anchor_id` entity type.
     */
    public function __construct(
        protected ?string $anchorType = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['anchor_type' => $this->anchorType]);
    }
}
