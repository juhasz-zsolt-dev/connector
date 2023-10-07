<?php

namespace App\Http\Integrations\PayPal\Requests\Payouts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show payout item details
 */
class ShowPayoutItemDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/payments/payouts-item/{$this->payoutItemId}";
	}


	/**
	 * @param string $payoutItemId
	 */
	public function __construct(
		protected string $payoutItemId,
	) {
	}
}
