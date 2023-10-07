<?php

namespace App\Http\Integrations\Stripe\Requests\TopUps;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a top-up
 */
class CreateTopUp extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/topups";
	}


	public function __construct()
	{
	}
}
