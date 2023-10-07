<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Prices\CreatePrice;
use App\Http\Integrations\Stripe\Requests\Prices\ListAllPrices;
use App\Http\Integrations\Stripe\Requests\Prices\RetrievePrice;
use App\Http\Integrations\Stripe\Requests\Prices\SearchPrices;
use App\Http\Integrations\Stripe\Requests\Prices\UpdatePrice;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Prices extends Resource
{
    /**
     * @param  string  $active Only return prices that are active or inactive (e.g., pass `false` to list all inactive prices).
     * @param  string  $createdgt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdgte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdlt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdlte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $currency Only return prices for the given currency.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $lookupKeys0 Only return the price with these lookup_keys, if any exist.
     * @param  string  $lookupKeys1 Only return the price with these lookup_keys, if any exist.
     * @param  string  $product Only return prices for the given product.
     * @param  string  $recurringinterval Only return prices with these recurring fields.
     * @param  string  $recurringusageType Only return prices with these recurring fields.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $type Only return prices of type `recurring` or `one_time`.
     */
    public function listAllPrices(
        ?string $active,
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $currency,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $lookupKeys0,
        ?string $lookupKeys1,
        ?string $product,
        ?string $recurringinterval,
        ?string $recurringusageType,
        ?string $startingAfter,
        ?string $type,
    ): Response {
        return $this->connector->send(new ListAllPrices($active, $createdgt, $createdgte, $createdlt, $createdlte, $currency, $endingBefore, $expand0, $expand1, $limit, $lookupKeys0, $lookupKeys1, $product, $recurringinterval, $recurringusageType, $startingAfter, $type));
    }

    public function createPrice(): Response
    {
        return $this->connector->send(new CreatePrice());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $page A cursor for pagination across multiple pages of results. Don't include this parameter on the first call. Use the next_page value returned in a previous response to request subsequent results.
     * @param  string  $query (Required) The search query string. See [search query language](https://stripe.com/docs/search#search-query-language) and the list of supported [query fields for prices](https://stripe.com/docs/search#query-fields-for-prices).
     */
    public function searchPrices(
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $page,
        ?string $query,
    ): Response {
        return $this->connector->send(new SearchPrices($expand0, $expand1, $limit, $page, $query));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrievePrice(string $price, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrievePrice($price, $expand0, $expand1));
    }

    public function updatePrice(string $price): Response
    {
        return $this->connector->send(new UpdatePrice($price));
    }
}
