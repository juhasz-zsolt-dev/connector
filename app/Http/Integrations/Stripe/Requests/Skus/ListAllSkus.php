<?php

namespace App\Http\Integrations\Stripe\Requests\Skus;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all SKUs
 */
class ListAllSkus extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/skus";
	}


	/**
	 * @param null|string $active Only return SKUs that are active or inactive (e.g., pass `false` to list all inactive products).
	 * @param null|string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $ids0 Only return SKUs with the given IDs.
	 * @param null|string $ids1 Only return SKUs with the given IDs.
	 * @param null|string $inStock Only return SKUs that are either in stock or out of stock (e.g., pass `false` to list all SKUs that are out of stock). If no value is provided, all SKUs are returned.
	 * @param null|string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param null|string $product The ID of the product whose SKUs will be retrieved. Must be a product with type `good`.
	 * @param null|string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function __construct(
		protected ?string $active = null,
		protected ?string $endingBefore = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $ids0 = null,
		protected ?string $ids1 = null,
		protected ?string $inStock = null,
		protected ?string $limit = null,
		protected ?string $product = null,
		protected ?string $startingAfter = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'active' => $this->active,
			'ending_before' => $this->endingBefore,
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'ids[0]' => $this->ids0,
			'ids[1]' => $this->ids1,
			'in_stock' => $this->inStock,
			'limit' => $this->limit,
			'product' => $this->product,
			'starting_after' => $this->startingAfter,
		]);
	}
}
