<?php

namespace App\Http\Integrations\Stripe\Requests\RadarValueList;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a value list
 */
class UpdateValueList extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/radar/value_lists/{$this->valueList}";
	}


	/**
	 * @param string $valueList
	 */
	public function __construct(
		protected string $valueList,
	) {
	}
}
