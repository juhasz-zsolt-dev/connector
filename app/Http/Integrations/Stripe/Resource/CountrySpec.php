<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\CountrySpec\ListCountrySpecs;
use App\Http\Integrations\Stripe\Requests\CountrySpec\RetrieveCountrySpec;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class CountrySpec extends Resource
{
	/**
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listCountrySpecs(
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListCountrySpecs($endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	/**
	 * @param string $country
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveCountrySpec(string $country, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveCountrySpec($country, $expand0, $expand1));
	}
}
