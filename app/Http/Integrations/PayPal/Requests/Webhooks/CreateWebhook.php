<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create webhook
 */
class CreateWebhook extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/notifications/webhooks";
	}


	/**
	 * @param null|mixed $url
	 * @param null|mixed $eventTypes
	 */
	public function __construct(
		protected mixed $url = null,
		protected mixed $eventTypes = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['url' => $this->url, 'event_types' => $this->eventTypes]);
	}
}
