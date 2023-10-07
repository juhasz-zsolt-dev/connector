<?php

namespace App\Http\Integrations\Stripe\Requests\SubscriptionSchedules;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Release a schedule
 */
class ReleaseSchedule extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/subscription_schedules/{$this->schedule}/release";
	}


	/**
	 * @param string $schedule
	 */
	public function __construct(
		protected string $schedule,
	) {
	}
}
