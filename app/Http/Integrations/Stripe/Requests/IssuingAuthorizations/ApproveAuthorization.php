<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingAuthorizations;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Approve an authorization
 */
class ApproveAuthorization extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/issuing/authorizations/{$this->authorization}/approve";
	}


	/**
	 * @param string $authorization
	 */
	public function __construct(
		protected string $authorization,
	) {
	}
}
