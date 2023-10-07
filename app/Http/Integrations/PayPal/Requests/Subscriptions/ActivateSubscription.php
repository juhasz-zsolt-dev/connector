<?php

namespace App\Http\Integrations\PayPal\Requests\Subscriptions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Activate subscription
 */
class ActivateSubscription extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/billing/subscriptions/{$this->subscriptionId}/activate";
	}


	/**
	 * @param string $subscriptionId
	 * @param null|mixed $reason
	 */
	public function __construct(
		protected string $subscriptionId,
		protected mixed $reason = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['reason' => $this->reason]);
	}
}
