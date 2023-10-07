<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Checkout\CreateSession;
use App\Http\Integrations\Stripe\Requests\Checkout\ExpireSession;
use App\Http\Integrations\Stripe\Requests\Checkout\ListAllCheckoutSessions;
use App\Http\Integrations\Stripe\Requests\Checkout\RetrieveSession;
use App\Http\Integrations\Stripe\Requests\Checkout\RetrieveSessionLineItems;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Checkout extends Resource
{
    /**
     * @param  string  $customer Only return the Checkout Sessions for the Customer specified.
     * @param  string  $customerDetailsemail Only return the Checkout Sessions for the Customer details specified.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $paymentIntent Only return the Checkout Session for the PaymentIntent specified.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $subscription Only return the Checkout Session for the subscription specified.
     */
    public function listAllCheckoutSessions(
        ?string $customer,
        ?string $customerDetailsemail,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $paymentIntent,
        ?string $startingAfter,
        ?string $subscription,
    ): Response {
        return $this->connector->send(new ListAllCheckoutSessions($customer, $customerDetailsemail, $endingBefore, $expand0, $expand1, $limit, $paymentIntent, $startingAfter, $subscription));
    }

    public function createSession(): Response
    {
        return $this->connector->send(new CreateSession());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveSession(string $session, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveSession($session, $expand0, $expand1));
    }

    public function expireSession(string $session): Response
    {
        return $this->connector->send(new ExpireSession($session));
    }

    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function retrieveSessionLineItems(
        string $session,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new RetrieveSessionLineItems($session, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
    }
}
