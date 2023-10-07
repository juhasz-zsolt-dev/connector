<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\ExchangeRates\ListAllExchangeRates;
use App\Http\Integrations\Stripe\Requests\ExchangeRates\RetrieveExchangeRate;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class ExchangeRates extends Resource
{
	/**
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is the currency that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with the exchange rate for currency X your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and total number of supported payout currencies, and the default is the max.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is the currency that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with the exchange rate for currency X, your subsequent call can include `starting_after=X` in order to fetch the next page of the list.
	 */
	public function listAllExchangeRates(
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllExchangeRates($endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	/**
	 * @param string $rateId
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveExchangeRate(string $rateId, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveExchangeRate($rateId, $expand0, $expand1));
	}
}
