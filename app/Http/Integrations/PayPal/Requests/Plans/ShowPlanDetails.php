<?php

namespace App\Http\Integrations\PayPal\Requests\Plans;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show plan details
 */
class ShowPlanDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/billing/plans/{$this->billingPlanId}";
	}


	/**
	 * @param string $billingPlanId
	 */
	public function __construct(
		protected string $billingPlanId,
	) {
	}
}
