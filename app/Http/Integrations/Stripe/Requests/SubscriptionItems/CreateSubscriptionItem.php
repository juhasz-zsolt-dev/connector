<?php

namespace App\Http\Integrations\Stripe\Requests\SubscriptionItems;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a subscription item
 */
class CreateSubscriptionItem extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/subscription_items";
	}


	public function __construct()
	{
	}
}
