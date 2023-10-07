<?php

namespace App\Http\Integrations\Stripe\Requests\WebhookEndpoints;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a webhook endpoint
 */
class CreateWebhookEndpoint extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/webhook_endpoints";
	}


	public function __construct()
	{
	}
}
