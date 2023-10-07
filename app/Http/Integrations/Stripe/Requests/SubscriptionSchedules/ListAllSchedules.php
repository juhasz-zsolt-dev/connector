<?php

namespace App\Http\Integrations\Stripe\Requests\SubscriptionSchedules;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all schedules
 */
class ListAllSchedules extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/subscription_schedules';
    }

    /**
     * @param  null|string  $canceledAtgt Only return subscription schedules that were created canceled the given date interval.
     * @param  null|string  $canceledAtgte Only return subscription schedules that were created canceled the given date interval.
     * @param  null|string  $canceledAtlt Only return subscription schedules that were created canceled the given date interval.
     * @param  null|string  $canceledAtlte Only return subscription schedules that were created canceled the given date interval.
     * @param  null|string  $completedAtgt Only return subscription schedules that completed during the given date interval.
     * @param  null|string  $completedAtgte Only return subscription schedules that completed during the given date interval.
     * @param  null|string  $completedAtlt Only return subscription schedules that completed during the given date interval.
     * @param  null|string  $completedAtlte Only return subscription schedules that completed during the given date interval.
     * @param  null|string  $createdgt Only return subscription schedules that were created during the given date interval.
     * @param  null|string  $createdgte Only return subscription schedules that were created during the given date interval.
     * @param  null|string  $createdlt Only return subscription schedules that were created during the given date interval.
     * @param  null|string  $createdlte Only return subscription schedules that were created during the given date interval.
     * @param  null|string  $customer Only return subscription schedules for the given customer.
     * @param  null|string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $releasedAtgt Only return subscription schedules that were released during the given date interval.
     * @param  null|string  $releasedAtgte Only return subscription schedules that were released during the given date interval.
     * @param  null|string  $releasedAtlt Only return subscription schedules that were released during the given date interval.
     * @param  null|string  $releasedAtlte Only return subscription schedules that were released during the given date interval.
     * @param  null|string  $scheduled Only return subscription schedules that have not started yet.
     * @param  null|string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function __construct(
        protected ?string $canceledAtgt = null,
        protected ?string $canceledAtgte = null,
        protected ?string $canceledAtlt = null,
        protected ?string $canceledAtlte = null,
        protected ?string $completedAtgt = null,
        protected ?string $completedAtgte = null,
        protected ?string $completedAtlt = null,
        protected ?string $completedAtlte = null,
        protected ?string $createdgt = null,
        protected ?string $createdgte = null,
        protected ?string $createdlt = null,
        protected ?string $createdlte = null,
        protected ?string $customer = null,
        protected ?string $endingBefore = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $limit = null,
        protected ?string $releasedAtgt = null,
        protected ?string $releasedAtgte = null,
        protected ?string $releasedAtlt = null,
        protected ?string $releasedAtlte = null,
        protected ?string $scheduled = null,
        protected ?string $startingAfter = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'canceled_at[gt]' => $this->canceledAtgt,
            'canceled_at[gte]' => $this->canceledAtgte,
            'canceled_at[lt]' => $this->canceledAtlt,
            'canceled_at[lte]' => $this->canceledAtlte,
            'completed_at[gt]' => $this->completedAtgt,
            'completed_at[gte]' => $this->completedAtgte,
            'completed_at[lt]' => $this->completedAtlt,
            'completed_at[lte]' => $this->completedAtlte,
            'created[gt]' => $this->createdgt,
            'created[gte]' => $this->createdgte,
            'created[lt]' => $this->createdlt,
            'created[lte]' => $this->createdlte,
            'customer' => $this->customer,
            'ending_before' => $this->endingBefore,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'limit' => $this->limit,
            'released_at[gt]' => $this->releasedAtgt,
            'released_at[gte]' => $this->releasedAtgte,
            'released_at[lt]' => $this->releasedAtlt,
            'released_at[lte]' => $this->releasedAtlte,
            'scheduled' => $this->scheduled,
            'starting_after' => $this->startingAfter,
        ]);
    }
}
