<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update webhook
 */
class UpdateWebhook extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/v1/notifications/webhooks/{$this->webhookId}";
	}


	/**
	 * @param string $webhookId
	 * @param null|array $values
	 */
	public function __construct(
		protected string $webhookId,
		protected ?array $values = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['values' => $this->values]);
	}
}
