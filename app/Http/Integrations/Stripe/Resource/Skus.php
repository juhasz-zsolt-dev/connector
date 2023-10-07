<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Skus\CreateSku;
use App\Http\Integrations\Stripe\Requests\Skus\DeleteSku;
use App\Http\Integrations\Stripe\Requests\Skus\ListAllSkus;
use App\Http\Integrations\Stripe\Requests\Skus\RetrieveSku;
use App\Http\Integrations\Stripe\Requests\Skus\UpdateSku;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Skus extends Resource
{
	/**
	 * @param string $active Only return SKUs that are active or inactive (e.g., pass `false` to list all inactive products).
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $ids0 Only return SKUs with the given IDs.
	 * @param string $ids1 Only return SKUs with the given IDs.
	 * @param string $inStock Only return SKUs that are either in stock or out of stock (e.g., pass `false` to list all SKUs that are out of stock). If no value is provided, all SKUs are returned.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $product The ID of the product whose SKUs will be retrieved. Must be a product with type `good`.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllSkus(
		?string $active,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $ids0,
		?string $ids1,
		?string $inStock,
		?string $limit,
		?string $product,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllSkus($active, $endingBefore, $expand0, $expand1, $ids0, $ids1, $inStock, $limit, $product, $startingAfter));
	}


	public function createSku(): Response
	{
		return $this->connector->send(new CreateSku());
	}


	/**
	 * @param string $id
	 */
	public function deleteSku(string $id): Response
	{
		return $this->connector->send(new DeleteSku($id));
	}


	/**
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveSku(string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveSku($id, $expand0, $expand1));
	}


	/**
	 * @param string $id
	 */
	public function updateSku(string $id): Response
	{
		return $this->connector->send(new UpdateSku($id));
	}
}
