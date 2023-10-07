<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalLocations;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a location
 */
class CreateLocation extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/terminal/locations";
	}


	public function __construct()
	{
	}
}
