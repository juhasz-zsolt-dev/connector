<?php

namespace App\Http\Integrations\Stripe\Requests\Transfers;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a transfer
 */
class UpdateTransfer extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/transfers/{$this->transfer}";
	}


	/**
	 * @param string $transfer
	 */
	public function __construct(
		protected string $transfer,
	) {
	}
}
