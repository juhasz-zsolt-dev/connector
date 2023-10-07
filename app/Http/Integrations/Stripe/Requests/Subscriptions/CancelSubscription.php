<?php

namespace App\Http\Integrations\Stripe\Requests\Subscriptions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Cancel a subscription
 */
class CancelSubscription extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v1/subscriptions/{$this->subscriptionExposedId}";
	}


	/**
	 * @param string $subscriptionExposedId
	 */
	public function __construct(
		protected string $subscriptionExposedId,
	) {
	}
}
