<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TaxRates\CreateTaxRate;
use App\Http\Integrations\Stripe\Requests\TaxRates\ListAllTaxRates;
use App\Http\Integrations\Stripe\Requests\TaxRates\RetrieveTaxRate;
use App\Http\Integrations\Stripe\Requests\TaxRates\UpdateTaxRate;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TaxRates extends Resource
{
	/**
	 * @param string $active Optional flag to filter by tax rates that are either active or inactive (archived).
	 * @param string $createdgt Optional range for filtering created date.
	 * @param string $createdgte Optional range for filtering created date.
	 * @param string $createdlt Optional range for filtering created date.
	 * @param string $createdlte Optional range for filtering created date.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $inclusive Optional flag to filter by tax rates that are inclusive (or those that are not inclusive).
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllTaxRates(
		?string $active,
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $inclusive,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllTaxRates($active, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $inclusive, $limit, $startingAfter));
	}


	public function createTaxRate(): Response
	{
		return $this->connector->send(new CreateTaxRate());
	}


	/**
	 * @param string $taxRate
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveTaxRate(string $taxRate, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveTaxRate($taxRate, $expand0, $expand1));
	}


	/**
	 * @param string $taxRate
	 */
	public function updateTaxRate(string $taxRate): Response
	{
		return $this->connector->send(new UpdateTaxRate($taxRate));
	}
}
