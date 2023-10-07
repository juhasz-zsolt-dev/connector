<?php

namespace App\Http\Integrations\Stripe\Requests\Charges;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a charge
 */
class CreateCharge extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/charges";
	}


	public function __construct()
	{
	}
}
