<?php

namespace App\Http\Integrations\Stripe\Requests\Disputes;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Close a dispute
 */
class CloseDispute extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/disputes/{$this->dispute}/close";
	}


	/**
	 * @param string $dispute
	 */
	public function __construct(
		protected string $dispute,
	) {
	}
}
