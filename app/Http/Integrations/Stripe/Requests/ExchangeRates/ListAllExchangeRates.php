<?php

namespace App\Http\Integrations\Stripe\Requests\ExchangeRates;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all exchange rates
 */
class ListAllExchangeRates extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/exchange_rates";
	}


	/**
	 * @param null|string $endingBefore A cursor for use in pagination. `ending_before` is the currency that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with the exchange rate for currency X your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $limit A limit on the number of objects to be returned. Limit can range between 1 and total number of supported payout currencies, and the default is the max.
	 * @param null|string $startingAfter A cursor for use in pagination. `starting_after` is the currency that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with the exchange rate for currency X, your subsequent call can include `starting_after=X` in order to fetch the next page of the list.
	 */
	public function __construct(
		protected ?string $endingBefore = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $limit = null,
		protected ?string $startingAfter = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'ending_before' => $this->endingBefore,
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'limit' => $this->limit,
			'starting_after' => $this->startingAfter,
		]);
	}
}
