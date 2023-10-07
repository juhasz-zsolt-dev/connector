<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show event notification details
 */
class ShowEventNotificationDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/notifications/webhooks-events/{$this->eventId}";
	}


	/**
	 * @param string $eventId
	 */
	public function __construct(
		protected string $eventId,
	) {
	}
}
