<?php

namespace App\Http\Integrations\Stripe\Requests\PaymentMethods;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Attach a PaymentMethod
 */
class AttachPaymentMethod extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/payment_methods/{$this->paymentMethod}/attach";
	}


	/**
	 * @param string $paymentMethod
	 */
	public function __construct(
		protected string $paymentMethod,
	) {
	}
}
