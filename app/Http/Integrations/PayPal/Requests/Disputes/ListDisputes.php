<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List disputes
 */
class ListDisputes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/customer/disputes';
    }

    /**
     * @param  null|string  $startTime Filters the disputes in the response by a creation date and time. The start time must be within the last 180 days. Value is in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example, *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.<br/><br/>You can specify either but not both the `start_time` and `disputed_transaction_id` query parameters.
     * @param  null|string  $disputedTransactionId Filters the disputes in the response by a transaction, by ID.<br/><br/>You can specify either but not both the `start_time` and `disputed_transaction_id` query parameter.
     * @param  null|string  $pageSize Limits the number of disputes in the response to this value.
     * @param  null|string  $nextPageToken The token that describes the next page of results to fetch. The <a href="https://developer.paypal.com/api/customer-disputes/v1/#disputes_list">list disputes</a> call returns this token in the HATEOAS links in the response.
     * @param  null|string  $disputeState Filters the disputes in the response by a state. Separate multiple values with a comma (`,`). When you specify more than one dispute_state, the response lists disputes that belong to any of the specified dispute_state.
     * @param  null|string  $updateTimeBefore The date and time when the dispute was last updated, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example, *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`. update_time_before must be within the last 180 days and the default is the current time.
     * @param  null|string  $updateTimeAfter The date and time when the dispute was last updated, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example, *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`. update_time_after must be within the last 180 days and the default is the maximum time (180 days) supported.
     */
    public function __construct(
        protected ?string $startTime = null,
        protected ?string $disputedTransactionId = null,
        protected ?string $pageSize = null,
        protected ?string $nextPageToken = null,
        protected ?string $disputeState = null,
        protected ?string $updateTimeBefore = null,
        protected ?string $updateTimeAfter = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'start_time' => $this->startTime,
            'disputed_transaction_id' => $this->disputedTransactionId,
            'page_size' => $this->pageSize,
            'next_page_token' => $this->nextPageToken,
            'dispute_state' => $this->disputeState,
            'update_time_before' => $this->updateTimeBefore,
            'update_time_after' => $this->updateTimeAfter,
        ]);
    }
}
