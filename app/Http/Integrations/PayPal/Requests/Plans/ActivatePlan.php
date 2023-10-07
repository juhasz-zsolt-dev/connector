<?php

namespace App\Http\Integrations\PayPal\Requests\Plans;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Activate plan
 */
class ActivatePlan extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/billing/plans/{$this->billingPlanId}/activate";
	}


	/**
	 * @param string $billingPlanId
	 */
	public function __construct(
		protected string $billingPlanId,
	) {
	}
}
