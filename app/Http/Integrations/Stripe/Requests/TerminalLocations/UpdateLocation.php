<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalLocations;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a location
 */
class UpdateLocation extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/terminal/locations/{$this->location}";
	}


	/**
	 * @param string $location
	 */
	public function __construct(
		protected string $location,
	) {
	}
}
