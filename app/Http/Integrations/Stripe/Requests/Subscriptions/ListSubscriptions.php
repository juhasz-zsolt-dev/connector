<?php

namespace App\Http\Integrations\Stripe\Requests\Subscriptions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List subscriptions
 */
class ListSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/subscriptions';
    }

    /**
     * @param  null|string  $collectionMethod The collection method of the subscriptions to retrieve. Either `charge_automatically` or `send_invoice`.
     * @param  null|string  $customer The ID of the customer whose subscriptions will be retrieved.
     * @param  null|string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $price Filter for subscriptions that contain this recurring price ID.
     * @param  null|string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  null|string  $status The status of the subscriptions to retrieve. Passing in a value of `canceled` will return all canceled subscriptions, including those belonging to deleted customers. Pass `ended` to find subscriptions that are canceled and subscriptions that are expired due to [incomplete payment](https://stripe.com/docs/billing/subscriptions/overview#subscription-statuses). Passing in a value of `all` will return subscriptions of all statuses. If no value is supplied, all subscriptions that have not been canceled are returned.
     * @param  null|string  $testClock Filter for subscriptions that are associated with the specified test clock. The response will not include subscriptions with test clocks if this and the customer parameter is not set.
     */
    public function __construct(
        protected ?string $collectionMethod = null,
        protected ?string $createdgt = null,
        protected ?string $createdgte = null,
        protected ?string $createdlt = null,
        protected ?string $createdlte = null,
        protected ?string $currentPeriodEndgt = null,
        protected ?string $currentPeriodEndgte = null,
        protected ?string $currentPeriodEndlt = null,
        protected ?string $currentPeriodEndlte = null,
        protected ?string $currentPeriodStartgt = null,
        protected ?string $currentPeriodStartgte = null,
        protected ?string $currentPeriodStartlt = null,
        protected ?string $currentPeriodStartlte = null,
        protected ?string $customer = null,
        protected ?string $endingBefore = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $limit = null,
        protected ?string $price = null,
        protected ?string $startingAfter = null,
        protected ?string $status = null,
        protected ?string $testClock = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'collection_method' => $this->collectionMethod,
            'created[gt]' => $this->createdgt,
            'created[gte]' => $this->createdgte,
            'created[lt]' => $this->createdlt,
            'created[lte]' => $this->createdlte,
            'current_period_end[gt]' => $this->currentPeriodEndgt,
            'current_period_end[gte]' => $this->currentPeriodEndgte,
            'current_period_end[lt]' => $this->currentPeriodEndlt,
            'current_period_end[lte]' => $this->currentPeriodEndlte,
            'current_period_start[gt]' => $this->currentPeriodStartgt,
            'current_period_start[gte]' => $this->currentPeriodStartgte,
            'current_period_start[lt]' => $this->currentPeriodStartlt,
            'current_period_start[lte]' => $this->currentPeriodStartlte,
            'customer' => $this->customer,
            'ending_before' => $this->endingBefore,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'limit' => $this->limit,
            'price' => $this->price,
            'starting_after' => $this->startingAfter,
            'status' => $this->status,
            'test_clock' => $this->testClock,
        ]);
    }
}
