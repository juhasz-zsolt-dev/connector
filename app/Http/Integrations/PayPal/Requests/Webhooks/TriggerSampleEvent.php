<?php

namespace App\Http\Integrations\PayPal\Requests\Webhooks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Trigger a sample event
 */
class TriggerSampleEvent extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/catalogs/products";
	}


	/**
	 * @param null|mixed $id
	 * @param null|mixed $name
	 */
	public function __construct(
		protected mixed $id = null,
		protected mixed $name = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['id' => $this->id, 'name' => $this->name]);
	}
}
