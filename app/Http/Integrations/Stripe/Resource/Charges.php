<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Charges\CaptureCharge;
use App\Http\Integrations\Stripe\Requests\Charges\CreateCharge;
use App\Http\Integrations\Stripe\Requests\Charges\ListAllCharges;
use App\Http\Integrations\Stripe\Requests\Charges\RetrieveCharge;
use App\Http\Integrations\Stripe\Requests\Charges\SearchCharges;
use App\Http\Integrations\Stripe\Requests\Charges\UpdateCharge;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Charges extends Resource
{
    /**
     * @param  string  $customer Only return charges for the customer specified by this customer ID.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $paymentIntent Only return charges that were created by the PaymentIntent specified by this PaymentIntent ID.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $transferGroup Only return charges for this transfer group.
     */
    public function listAllCharges(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $paymentIntent,
        ?string $startingAfter,
        ?string $transferGroup,
    ): Response {
        return $this->connector->send(new ListAllCharges($createdgt, $createdgte, $createdlt, $createdlte, $customer, $endingBefore, $expand0, $expand1, $limit, $paymentIntent, $startingAfter, $transferGroup));
    }

    public function createCharge(): Response
    {
        return $this->connector->send(new CreateCharge());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $page A cursor for pagination across multiple pages of results. Don't include this parameter on the first call. Use the next_page value returned in a previous response to request subsequent results.
     * @param  string  $query (Required) The search query string. See [search query language](https://stripe.com/docs/search#search-query-language) and the list of supported [query fields for charges](https://stripe.com/docs/search#query-fields-for-charges).
     */
    public function searchCharges(
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $page,
        ?string $query,
    ): Response {
        return $this->connector->send(new SearchCharges($expand0, $expand1, $limit, $page, $query));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveCharge(string $charge, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveCharge($charge, $expand0, $expand1));
    }

    public function updateCharge(string $charge): Response
    {
        return $this->connector->send(new UpdateCharge($charge));
    }

    public function captureCharge(string $charge): Response
    {
        return $this->connector->send(new CaptureCharge($charge));
    }
}
