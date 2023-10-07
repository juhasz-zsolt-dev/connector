<?php

namespace App\Http\Integrations\Stripe\Requests\PaymentIntents;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Increment an authorization
 */
class IncrementAuthorization extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/payment_intents/{$this->intent}/increment_authorization";
	}


	/**
	 * @param string $intent
	 */
	public function __construct(
		protected string $intent,
	) {
	}
}
