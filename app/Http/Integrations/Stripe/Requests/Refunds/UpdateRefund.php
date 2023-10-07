<?php

namespace App\Http\Integrations\Stripe\Requests\Refunds;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a refund
 */
class UpdateRefund extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/refunds/{$this->refund}";
	}


	/**
	 * @param string $refund
	 */
	public function __construct(
		protected string $refund,
	) {
	}
}
