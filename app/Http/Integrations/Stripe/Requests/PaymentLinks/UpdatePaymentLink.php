<?php

namespace App\Http\Integrations\Stripe\Requests\PaymentLinks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a payment link
 */
class UpdatePaymentLink extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/payment_links/{$this->paymentLink}";
	}


	/**
	 * @param string $paymentLink
	 */
	public function __construct(
		protected string $paymentLink,
	) {
	}
}
