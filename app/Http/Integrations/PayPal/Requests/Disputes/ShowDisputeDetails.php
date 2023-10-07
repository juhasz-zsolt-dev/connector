<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show dispute details
 */
class ShowDisputeDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/customer/disputes/{$this->disputeId}";
	}


	/**
	 * @param string $disputeId
	 */
	public function __construct(
		protected string $disputeId,
	) {
	}
}
