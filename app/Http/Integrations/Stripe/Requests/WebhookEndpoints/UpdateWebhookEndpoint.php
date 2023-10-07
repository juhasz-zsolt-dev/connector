<?php

namespace App\Http\Integrations\Stripe\Requests\WebhookEndpoints;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a webhook endpoint
 */
class UpdateWebhookEndpoint extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/webhook_endpoints/{$this->webhookEndpoint}";
	}


	/**
	 * @param string $webhookEndpoint
	 */
	public function __construct(
		protected string $webhookEndpoint,
	) {
	}
}
