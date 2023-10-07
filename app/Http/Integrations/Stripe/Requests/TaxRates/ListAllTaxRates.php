<?php

namespace App\Http\Integrations\Stripe\Requests\TaxRates;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all tax rates
 */
class ListAllTaxRates extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/tax_rates";
	}


	/**
	 * @param null|string $active Optional flag to filter by tax rates that are either active or inactive (archived).
	 * @param null|string $createdgt Optional range for filtering created date.
	 * @param null|string $createdgte Optional range for filtering created date.
	 * @param null|string $createdlt Optional range for filtering created date.
	 * @param null|string $createdlte Optional range for filtering created date.
	 * @param null|string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $inclusive Optional flag to filter by tax rates that are inclusive (or those that are not inclusive).
	 * @param null|string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param null|string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
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
		protected ?string $inclusive = null,
		protected ?string $limit = null,
		protected ?string $startingAfter = null,
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
			'inclusive' => $this->inclusive,
			'limit' => $this->limit,
			'starting_after' => $this->startingAfter,
		]);
	}
}
