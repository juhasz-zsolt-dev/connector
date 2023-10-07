<?php

namespace App\Http\Integrations\Stripe\Requests\PaymentLinks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a payment link
 */
class CreatePaymentLink extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/payment_links";
	}


	public function __construct()
	{
	}
}
