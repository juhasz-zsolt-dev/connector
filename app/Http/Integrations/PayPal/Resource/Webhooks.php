<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Webhooks\CreateWebhook;
use App\Http\Integrations\PayPal\Requests\Webhooks\DeleteWebhook;
use App\Http\Integrations\PayPal\Requests\Webhooks\ListAvailableEvents;
use App\Http\Integrations\PayPal\Requests\Webhooks\ListEventNotifications;
use App\Http\Integrations\PayPal\Requests\Webhooks\ListEventSubscriptionsForWebhook;
use App\Http\Integrations\PayPal\Requests\Webhooks\ListWebhooks;
use App\Http\Integrations\PayPal\Requests\Webhooks\ResendEventNotification;
use App\Http\Integrations\PayPal\Requests\Webhooks\ShowEventNotificationDetails;
use App\Http\Integrations\PayPal\Requests\Webhooks\ShowWebhookDetails;
use App\Http\Integrations\PayPal\Requests\Webhooks\SimulateWebhookEvent;
use App\Http\Integrations\PayPal\Requests\Webhooks\TriggerSampleEvent;
use App\Http\Integrations\PayPal\Requests\Webhooks\UpdateWebhook;
use App\Http\Integrations\PayPal\Requests\Webhooks\VerifyWebhookSignature;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Webhooks extends Resource
{
    public function listAvailableEvents(): Response
    {
        return $this->connector->send(new ListAvailableEvents());
    }

    public function createWebhook(mixed $url, mixed $eventTypes): Response
    {
        return $this->connector->send(new CreateWebhook($url, $eventTypes));
    }

    /**
     * @param  string  $anchorType Filters the webhooks in the response by an `anchor_id` entity type.
     * @param  string  $anchorType Filters the webhooks in the response by an `anchor_id` entity type.
     */
    public function listWebhooks(?string $anchorType): Response
    {
        return $this->connector->send(new ListWebhooks($anchorType, $anchorType));
    }

    public function showWebhookDetails(string $webhookId): Response
    {
        return $this->connector->send(new ShowWebhookDetails($webhookId));
    }

    /**
     * @param  string  $pageSize The number of webhook event notifications to return in the response.
     * @param  string  $startTime Filters the webhook event notifications in the response to those created on or after this date and time and on or before the `end_time` value. Both values are in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6) format. Example: `start_time=2013-03-06T11:00:00Z`.
     * @param  string  $endTime Filters the webhook event notifications in the response to those created on or after the `start_time` and on or before this date and time. Both values are in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6) format. Example: `end_time=2013-03-06T11:00:00Z`.
     * @param  string  $transactionId Filters the response to a single transaction, by ID.
     * @param  string  $eventType Filters the response to a single event.
     */
    public function listEventNotifications(
        ?string $pageSize,
        ?string $startTime,
        ?string $endTime,
        ?string $transactionId,
        ?string $eventType,
        ?string $moveTo,
        ?string $offset,
        ?string $prevOffset,
        ?string $indexId,
    ): Response {
        return $this->connector->send(new ListEventNotifications($pageSize, $startTime, $endTime, $transactionId, $eventType, $moveTo, $offset, $prevOffset, $indexId));
    }

    public function listEventSubscriptionsForWebhook(string $webhookId): Response
    {
        return $this->connector->send(new ListEventSubscriptionsForWebhook($webhookId));
    }

    public function showEventNotificationDetails(string $eventId): Response
    {
        return $this->connector->send(new ShowEventNotificationDetails($eventId));
    }

    public function triggerSampleEvent(mixed $id, mixed $name): Response
    {
        return $this->connector->send(new TriggerSampleEvent($id, $name));
    }

    public function verifyWebhookSignature(): Response
    {
        return $this->connector->send(new VerifyWebhookSignature());
    }

    public function resendEventNotification(string $eventId, mixed $webhookIds): Response
    {
        return $this->connector->send(new ResendEventNotification($eventId, $webhookIds));
    }

    public function simulateWebhookEvent(
        mixed $eventType,
        mixed $webhookId,
        mixed $url,
        mixed $resourceVersion,
    ): Response {
        return $this->connector->send(new SimulateWebhookEvent($eventType, $webhookId, $url, $resourceVersion));
    }

    public function updateWebhook(string $webhookId, ?array $values): Response
    {
        return $this->connector->send(new UpdateWebhook($webhookId, $values));
    }

    public function deleteWebhook(string $webhookId): Response
    {
        return $this->connector->send(new DeleteWebhook($webhookId));
    }
}
