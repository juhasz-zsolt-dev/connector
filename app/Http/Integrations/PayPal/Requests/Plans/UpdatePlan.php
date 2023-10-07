<?php

namespace App\Http\Integrations\PayPal\Requests\Plans;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update plan
 */
class UpdatePlan extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/v1/billing/plans/{$this->billingPlanId}";
	}


	/**
	 * @param string $billingPlanId
	 * @param null|array $values
	 */
	public function __construct(
		protected string $billingPlanId,
		protected ?array $values = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['values' => $this->values]);
	}
}
