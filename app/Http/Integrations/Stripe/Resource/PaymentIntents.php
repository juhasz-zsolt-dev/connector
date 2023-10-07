<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\PaymentIntents\CancelPaymentIntent;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\CapturePaymentIntent;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\ConfirmPaymentIntent;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\CreatePaymentIntent;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\IncrementAuthorization;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\ListAllPaymentIntents;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\ReconcileCustomerBalancePaymentIntent;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\RetrievePaymentIntent;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\SearchPaymentIntents;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\UpdatePaymentIntent;
use App\Http\Integrations\Stripe\Requests\PaymentIntents\VerifyMicrodepositsOnPaymentIntent;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class PaymentIntents extends Resource
{
    /**
     * @param  string  $createdgt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdgte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdlt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdlte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $customer Only return PaymentIntents for the customer specified by this customer ID.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllPaymentIntents(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllPaymentIntents($createdgt, $createdgte, $createdlt, $createdlte, $customer, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
    }

    public function createPaymentIntent(): Response
    {
        return $this->connector->send(new CreatePaymentIntent());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $page A cursor for pagination across multiple pages of results. Don't include this parameter on the first call. Use the next_page value returned in a previous response to request subsequent results.
     * @param  string  $query (Required) The search query string. See [search query language](https://stripe.com/docs/search#search-query-language) and the list of supported [query fields for payment intents](https://stripe.com/docs/search#query-fields-for-payment-intents).
     */
    public function searchPaymentIntents(
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $page,
        ?string $query,
    ): Response {
        return $this->connector->send(new SearchPaymentIntents($expand0, $expand1, $limit, $page, $query));
    }

    /**
     * @param  string  $clientSecret The client secret of the PaymentIntent. Required if a publishable key is used to retrieve the source.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrievePaymentIntent(
        string $intent,
        ?string $clientSecret,
        ?string $expand0,
        ?string $expand1,
    ): Response {
        return $this->connector->send(new RetrievePaymentIntent($intent, $clientSecret, $expand0, $expand1));
    }

    public function updatePaymentIntent(string $intent): Response
    {
        return $this->connector->send(new UpdatePaymentIntent($intent));
    }

    public function reconcileCustomerBalancePaymentIntent(string $intent): Response
    {
        return $this->connector->send(new ReconcileCustomerBalancePaymentIntent($intent));
    }

    public function cancelPaymentIntent(string $intent): Response
    {
        return $this->connector->send(new CancelPaymentIntent($intent));
    }

    public function capturePaymentIntent(string $intent): Response
    {
        return $this->connector->send(new CapturePaymentIntent($intent));
    }

    public function confirmPaymentIntent(string $intent): Response
    {
        return $this->connector->send(new ConfirmPaymentIntent($intent));
    }

    public function incrementAuthorization(string $intent): Response
    {
        return $this->connector->send(new IncrementAuthorization($intent));
    }

    public function verifyMicrodepositsOnPaymentIntent(string $intent): Response
    {
        return $this->connector->send(new VerifyMicrodepositsOnPaymentIntent($intent));
    }
}
