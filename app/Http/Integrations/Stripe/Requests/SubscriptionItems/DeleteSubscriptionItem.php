<?php

namespace App\Http\Integrations\Stripe\Requests\SubscriptionItems;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a subscription item
 */
class DeleteSubscriptionItem extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v1/subscription_items/{$this->item}";
	}


	/**
	 * @param string $item
	 */
	public function __construct(
		protected string $item,
	) {
	}
}
