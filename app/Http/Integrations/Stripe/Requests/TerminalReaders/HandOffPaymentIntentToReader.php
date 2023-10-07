<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalReaders;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Hand-off a PaymentIntent to a Reader
 */
class HandOffPaymentIntentToReader extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/terminal/readers/{$this->reader}/process_payment_intent";
	}


	/**
	 * @param string $reader
	 */
	public function __construct(
		protected string $reader,
	) {
	}
}
