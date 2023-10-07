<?php

namespace App\Http\Integrations\Covid19\Requests\Region;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * regions
 */
class Regions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/regions";
	}


	/**
	 * @param null|string $order Region list sorting.
	 * @param null|string $sort Sort directions.
	 */
	public function __construct(
		protected ?string $order = null,
		protected ?string $sort = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['order' => $this->order, 'sort' => $this->sort]);
	}
}
