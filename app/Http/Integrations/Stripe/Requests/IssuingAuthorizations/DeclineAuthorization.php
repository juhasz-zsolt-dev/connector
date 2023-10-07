<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingAuthorizations;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Decline an authorization
 */
class DeclineAuthorization extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/issuing/authorizations/{$this->authorization}/decline";
	}


	/**
	 * @param string $authorization
	 */
	public function __construct(
		protected string $authorization,
	) {
	}
}
