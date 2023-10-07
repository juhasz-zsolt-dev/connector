<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Products\CreateProduct;
use App\Http\Integrations\Stripe\Requests\Products\DeleteProduct;
use App\Http\Integrations\Stripe\Requests\Products\ListAllProducts;
use App\Http\Integrations\Stripe\Requests\Products\RetrieveProduct;
use App\Http\Integrations\Stripe\Requests\Products\SearchProducts;
use App\Http\Integrations\Stripe\Requests\Products\UpdateProduct;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Products extends Resource
{
	/**
	 * @param string $active Only return products that are active or inactive (e.g., pass `false` to list all inactive products).
	 * @param string $createdgt Only return products that were created during the given date interval.
	 * @param string $createdgte Only return products that were created during the given date interval.
	 * @param string $createdlt Only return products that were created during the given date interval.
	 * @param string $createdlte Only return products that were created during the given date interval.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $ids0 Only return products with the given IDs. Cannot be used with [starting_after](https://stripe.com/docs/api#list_products-starting_after) or [ending_before](https://stripe.com/docs/api#list_products-ending_before).
	 * @param string $ids1 Only return products with the given IDs. Cannot be used with [starting_after](https://stripe.com/docs/api#list_products-starting_after) or [ending_before](https://stripe.com/docs/api#list_products-ending_before).
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $shippable Only return products that can be shipped (i.e., physical, not digital products).
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $url Only return products with the given url.
	 */
	public function listAllProducts(
		?string $active,
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $ids0,
		?string $ids1,
		?string $limit,
		?string $shippable,
		?string $startingAfter,
		?string $url,
	): Response
	{
		return $this->connector->send(new ListAllProducts($active, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $ids0, $ids1, $limit, $shippable, $startingAfter, $url));
	}


	public function createProduct(): Response
	{
		return $this->connector->send(new CreateProduct());
	}


	/**
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $page A cursor for pagination across multiple pages of results. Don't include this parameter on the first call. Use the next_page value returned in a previous response to request subsequent results.
	 * @param string $query (Required) The search query string. See [search query language](https://stripe.com/docs/search#search-query-language) and the list of supported [query fields for products](https://stripe.com/docs/search#query-fields-for-products).
	 */
	public function searchProducts(
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $page,
		?string $query,
	): Response
	{
		return $this->connector->send(new SearchProducts($expand0, $expand1, $limit, $page, $query));
	}


	/**
	 * @param string $id
	 */
	public function deleteProduct(string $id): Response
	{
		return $this->connector->send(new DeleteProduct($id));
	}


	/**
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveProduct(string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveProduct($id, $expand0, $expand1));
	}


	/**
	 * @param string $id
	 */
	public function updateProduct(string $id): Response
	{
		return $this->connector->send(new UpdateProduct($id));
	}
}
