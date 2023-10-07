<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Resend event notification
 */
class ResendEventNotification extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/notifications/webhooks-events/{$this->eventId}/resend";
	}


	/**
	 * @param string $eventId
	 * @param null|mixed $webhookIds
	 */
	public function __construct(
		protected string $eventId,
		protected mixed $webhookIds = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['webhook_ids' => $this->webhookIds]);
	}
}
