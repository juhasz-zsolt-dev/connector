<?php

namespace App\Http\Integrations\Stripe\Requests\Quotes;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all quotes
 */
class ListAllQuotes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/quotes";
	}


	/**
	 * @param null|string $customer The ID of the customer whose quotes will be retrieved.
	 * @param null|string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param null|string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param null|string $status The status of the quote.
	 * @param null|string $testClock Provides a list of quotes that are associated with the specified test clock. The response will not include quotes with test clocks if this and the customer parameter is not set.
	 */
	public function __construct(
		protected ?string $customer = null,
		protected ?string $endingBefore = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $limit = null,
		protected ?string $startingAfter = null,
		protected ?string $status = null,
		protected ?string $testClock = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'customer' => $this->customer,
			'ending_before' => $this->endingBefore,
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'limit' => $this->limit,
			'starting_after' => $this->startingAfter,
			'status' => $this->status,
			'test_clock' => $this->testClock,
		]);
	}
}
