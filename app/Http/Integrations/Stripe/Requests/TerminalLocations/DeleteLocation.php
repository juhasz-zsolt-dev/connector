<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalLocations;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a location
 */
class DeleteLocation extends Request
{
	protected Method $method = Method::DELETE;


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
