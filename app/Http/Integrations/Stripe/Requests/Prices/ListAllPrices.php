<?php

namespace App\Http\Integrations\Stripe\Requests\Prices;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all prices
 */
class ListAllPrices extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/prices";
	}


	/**
	 * @param null|string $active Only return prices that are active or inactive (e.g., pass `false` to list all inactive prices).
	 * @param null|string $createdgt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
	 * @param null|string $createdgte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
	 * @param null|string $createdlt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
	 * @param null|string $createdlte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
	 * @param null|string $currency Only return prices for the given currency.
	 * @param null|string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param null|string $lookupKeys0 Only return the price with these lookup_keys, if any exist.
	 * @param null|string $lookupKeys1 Only return the price with these lookup_keys, if any exist.
	 * @param null|string $product Only return prices for the given product.
	 * @param null|string $recurringinterval Only return prices with these recurring fields.
	 * @param null|string $recurringusageType Only return prices with these recurring fields.
	 * @param null|string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param null|string $type Only return prices of type `recurring` or `one_time`.
	 */
	public function __construct(
		protected ?string $active = null,
		protected ?string $createdgt = null,
		protected ?string $createdgte = null,
		protected ?string $createdlt = null,
		protected ?string $createdlte = null,
		protected ?string $currency = null,
		protected ?string $endingBefore = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $limit = null,
		protected ?string $lookupKeys0 = null,
		protected ?string $lookupKeys1 = null,
		protected ?string $product = null,
		protected ?string $recurringinterval = null,
		protected ?string $recurringusageType = null,
		protected ?string $startingAfter = null,
		protected ?string $type = null,
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
			'currency' => $this->currency,
			'ending_before' => $this->endingBefore,
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'limit' => $this->limit,
			'lookup_keys[0]' => $this->lookupKeys0,
			'lookup_keys[1]' => $this->lookupKeys1,
			'product' => $this->product,
			'recurring[interval]' => $this->recurringinterval,
			'recurring[usage_type]' => $this->recurringusageType,
			'starting_after' => $this->startingAfter,
			'type' => $this->type,
		]);
	}
}
