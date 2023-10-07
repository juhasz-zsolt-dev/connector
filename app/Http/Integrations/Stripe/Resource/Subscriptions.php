<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Subscriptions\CancelSubscription;
use App\Http\Integrations\Stripe\Requests\Subscriptions\CreateSubscription;
use App\Http\Integrations\Stripe\Requests\Subscriptions\DeleteSubscriptionDiscount;
use App\Http\Integrations\Stripe\Requests\Subscriptions\ListSubscriptions;
use App\Http\Integrations\Stripe\Requests\Subscriptions\RetrieveSubscription;
use App\Http\Integrations\Stripe\Requests\Subscriptions\SearchSubscriptions;
use App\Http\Integrations\Stripe\Requests\Subscriptions\UpdateSubscription;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Subscriptions extends Resource
{
    /**
     * @param  string  $collectionMethod The collection method of the subscriptions to retrieve. Either `charge_automatically` or `send_invoice`.
     * @param  string  $customer The ID of the customer whose subscriptions will be retrieved.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $price Filter for subscriptions that contain this recurring price ID.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status The status of the subscriptions to retrieve. Passing in a value of `canceled` will return all canceled subscriptions, including those belonging to deleted customers. Pass `ended` to find subscriptions that are canceled and subscriptions that are expired due to [incomplete payment](https://stripe.com/docs/billing/subscriptions/overview#subscription-statuses). Passing in a value of `all` will return subscriptions of all statuses. If no value is supplied, all subscriptions that have not been canceled are returned.
     * @param  string  $testClock Filter for subscriptions that are associated with the specified test clock. The response will not include subscriptions with test clocks if this and the customer parameter is not set.
     */
    public function listSubscriptions(
        ?string $collectionMethod,
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $currentPeriodEndgt,
        ?string $currentPeriodEndgte,
        ?string $currentPeriodEndlt,
        ?string $currentPeriodEndlte,
        ?string $currentPeriodStartgt,
        ?string $currentPeriodStartgte,
        ?string $currentPeriodStartlt,
        ?string $currentPeriodStartlte,
        ?string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $price,
        ?string $startingAfter,
        ?string $status,
        ?string $testClock,
    ): Response {
        return $this->connector->send(new ListSubscriptions($collectionMethod, $createdgt, $createdgte, $createdlt, $createdlte, $currentPeriodEndgt, $currentPeriodEndgte, $currentPeriodEndlt, $currentPeriodEndlte, $currentPeriodStartgt, $currentPeriodStartgte, $currentPeriodStartlt, $currentPeriodStartlte, $customer, $endingBefore, $expand0, $expand1, $limit, $price, $startingAfter, $status, $testClock));
    }

    public function createSubscription(): Response
    {
        return $this->connector->send(new CreateSubscription());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $page A cursor for pagination across multiple pages of results. Don't include this parameter on the first call. Use the next_page value returned in a previous response to request subsequent results.
     * @param  string  $query (Required) The search query string. See [search query language](https://stripe.com/docs/search#search-query-language) and the list of supported [query fields for subscriptions](https://stripe.com/docs/search#query-fields-for-subscriptions).
     */
    public function searchSubscriptions(
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $page,
        ?string $query,
    ): Response {
        return $this->connector->send(new SearchSubscriptions($expand0, $expand1, $limit, $page, $query));
    }

    public function cancelSubscription(string $subscriptionExposedId): Response
    {
        return $this->connector->send(new CancelSubscription($subscriptionExposedId));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveSubscription(string $subscriptionExposedId, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveSubscription($subscriptionExposedId, $expand0, $expand1));
    }

    public function updateSubscription(string $subscriptionExposedId): Response
    {
        return $this->connector->send(new UpdateSubscription($subscriptionExposedId));
    }

    public function deleteSubscriptionDiscount(string $subscriptionExposedId): Response
    {
        return $this->connector->send(new DeleteSubscriptionDiscount($subscriptionExposedId));
    }
}
