<?php

namespace App\Http\Integrations\Stripe\Requests\SubscriptionSchedules;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a schedule
 */
class CreateSchedule extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/subscription_schedules";
	}


	public function __construct()
	{
	}
}
