<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List event notifications
 */
class ListEventNotifications extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/notifications/webhooks-events';
    }

    /**
     * @param  null|string  $pageSize The number of webhook event notifications to return in the response.
     * @param  null|string  $startTime Filters the webhook event notifications in the response to those created on or after this date and time and on or before the `end_time` value. Both values are in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6) format. Example: `start_time=2013-03-06T11:00:00Z`.
     * @param  null|string  $endTime Filters the webhook event notifications in the response to those created on or after the `start_time` and on or before this date and time. Both values are in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6) format. Example: `end_time=2013-03-06T11:00:00Z`.
     * @param  null|string  $transactionId Filters the response to a single transaction, by ID.
     * @param  null|string  $eventType Filters the response to a single event.
     */
    public function __construct(
        protected ?string $pageSize = null,
        protected ?string $startTime = null,
        protected ?string $endTime = null,
        protected ?string $transactionId = null,
        protected ?string $eventType = null,
        protected ?string $moveTo = null,
        protected ?string $offset = null,
        protected ?string $prevOffset = null,
        protected ?string $indexId = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'page_size' => $this->pageSize,
            'start_time' => $this->startTime,
            'end_time' => $this->endTime,
            'transaction_id' => $this->transactionId,
            'event_type' => $this->eventType,
            'move_to' => $this->moveTo,
            'offset' => $this->offset,
            'prev_offset' => $this->prevOffset,
            'index_id' => $this->indexId,
        ]);
    }
}
