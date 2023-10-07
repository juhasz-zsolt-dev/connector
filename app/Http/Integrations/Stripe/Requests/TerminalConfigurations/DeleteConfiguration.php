<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalConfigurations;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a Configuration
 */
class DeleteConfiguration extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v1/terminal/configurations/{$this->configuration}";
	}


	/**
	 * @param string $configuration
	 */
	public function __construct(
		protected string $configuration,
	) {
	}
}
