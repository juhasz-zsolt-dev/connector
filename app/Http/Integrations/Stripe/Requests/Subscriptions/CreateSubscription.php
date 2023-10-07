<?php

namespace App\Http\Integrations\Stripe\Requests\Subscriptions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a subscription
 */
class CreateSubscription extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/subscriptions";
	}


	public function __construct()
	{
	}
}
