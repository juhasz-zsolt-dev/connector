<?php

namespace App\Http\Integrations\Stripe\Requests\Checkout;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Expire a Session
 */
class ExpireSession extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/checkout/sessions/{$this->session}/expire";
	}


	/**
	 * @param string $session
	 */
	public function __construct(
		protected string $session,
	) {
	}
}
