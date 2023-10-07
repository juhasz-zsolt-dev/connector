<?php

namespace App\Http\Integrations\PayPal\Requests\Subscriptions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List transactions for subscription
 */
class ListTransactionsForSubscription extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/billing/subscriptions/{$this->subscriptionId}/transactions";
    }

    /**
     * @param  null|string  $startTime (Required) The start time of the range of transactions to list.
     * @param  null|string  $endTime (Required) The end time of the range of transactions to list.
     */
    public function __construct(
        protected string $subscriptionId,
        protected ?string $startTime = null,
        protected ?string $endTime = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['start_time' => $this->startTime, 'end_time' => $this->endTime]);
    }
}
