<?php

namespace App\Http\Integrations\Stripe\Requests\RadarValueList;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a value list
 */
class CreateValueList extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/radar/value_lists";
	}


	public function __construct()
	{
	}
}
