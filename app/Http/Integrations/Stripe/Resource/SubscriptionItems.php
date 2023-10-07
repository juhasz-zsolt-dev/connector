<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\SubscriptionItems\CreateSubscriptionItem;
use App\Http\Integrations\Stripe\Requests\SubscriptionItems\CreateUsageRecord;
use App\Http\Integrations\Stripe\Requests\SubscriptionItems\DeleteSubscriptionItem;
use App\Http\Integrations\Stripe\Requests\SubscriptionItems\ListAllSubscriptionItemPeriodSummaries;
use App\Http\Integrations\Stripe\Requests\SubscriptionItems\ListAllSubscriptionItems;
use App\Http\Integrations\Stripe\Requests\SubscriptionItems\RetrieveSubscriptionItem;
use App\Http\Integrations\Stripe\Requests\SubscriptionItems\UpdateSubscriptionItem;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class SubscriptionItems extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $subscription (Required) The ID of the subscription whose items will be retrieved.
     */
    public function listAllSubscriptionItems(
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
        ?string $subscription,
    ): Response {
        return $this->connector->send(new ListAllSubscriptionItems($endingBefore, $expand0, $expand1, $limit, $startingAfter, $subscription));
    }

    public function createSubscriptionItem(): Response
    {
        return $this->connector->send(new CreateSubscriptionItem());
    }

    public function deleteSubscriptionItem(string $item): Response
    {
        return $this->connector->send(new DeleteSubscriptionItem($item));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveSubscriptionItem(string $item, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveSubscriptionItem($item, $expand0, $expand1));
    }

    public function updateSubscriptionItem(string $item): Response
    {
        return $this->connector->send(new UpdateSubscriptionItem($item));
    }

    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllSubscriptionItemPeriodSummaries(
        string $subscriptionItem,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllSubscriptionItemPeriodSummaries($subscriptionItem, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
    }

    public function createUsageRecord(string $subscriptionItem): Response
    {
        return $this->connector->send(new CreateUsageRecord($subscriptionItem));
    }
}
