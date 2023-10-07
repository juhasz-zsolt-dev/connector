<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalReaders;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Simulate presenting a payment method
 */
class SimulatePresentingPaymentMethod extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/test_helpers/terminal/readers/{$this->reader}/present_payment_method";
	}


	/**
	 * @param string $reader
	 */
	public function __construct(
		protected string $reader,
	) {
	}
}
