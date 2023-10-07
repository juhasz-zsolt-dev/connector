<?php

namespace App\Http\Integrations\PayPal\Requests\Authorization;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Generate client_token
 */
class GenerateClientToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/identity/generate-token";
	}


	/**
	 * @param null|mixed $customerId
	 */
	public function __construct(
		protected mixed $customerId = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['customer_id' => $this->customerId]);
	}
}
