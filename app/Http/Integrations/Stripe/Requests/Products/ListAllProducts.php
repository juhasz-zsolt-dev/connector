<?php

namespace App\Http\Integrations\Stripe\Requests\Products;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all products
 */
class ListAllProducts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/products";
	}


	/**
	 * @param null|string $active Only return products that are active or inactive (e.g., pass `false` to list all inactive products).
	 * @param null|string $createdgt Only return products that were created during the given date interval.
	 * @param null|string $createdgte Only return products that were created during the given date interval.
	 * @param null|string $createdlt Only return products that were created during the given date interval.
	 * @param null|string $createdlte Only return products that were created during the given date interval.
	 * @param null|string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $ids0 Only return products with the given IDs. Cannot be used with [starting_after](https://stripe.com/docs/api#list_products-starting_after) or [ending_before](https://stripe.com/docs/api#list_products-ending_before).
	 * @param null|string $ids1 Only return products with the given IDs. Cannot be used with [starting_after](https://stripe.com/docs/api#list_products-starting_after) or [ending_before](https://stripe.com/docs/api#list_products-ending_before).
	 * @param null|string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param null|string $shippable Only return products that can be shipped (i.e., physical, not digital products).
	 * @param null|string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param null|string $url Only return products with the given url.
	 */
	public function __construct(
		protected ?string $active = null,
		protected ?string $createdgt = null,
		protected ?string $createdgte = null,
		protected ?string $createdlt = null,
		protected ?string $createdlte = null,
		protected ?string $endingBefore = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $ids0 = null,
		protected ?string $ids1 = null,
		protected ?string $limit = null,
		protected ?string $shippable = null,
		protected ?string $startingAfter = null,
		protected ?string $url = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'active' => $this->active,
			'created[gt]' => $this->createdgt,
			'created[gte]' => $this->createdgte,
			'created[lt]' => $this->createdlt,
			'created[lte]' => $this->createdlte,
			'ending_before' => $this->endingBefore,
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'ids[0]' => $this->ids0,
			'ids[1]' => $this->ids1,
			'limit' => $this->limit,
			'shippable' => $this->shippable,
			'starting_after' => $this->startingAfter,
			'url' => $this->url,
		]);
	}
}
