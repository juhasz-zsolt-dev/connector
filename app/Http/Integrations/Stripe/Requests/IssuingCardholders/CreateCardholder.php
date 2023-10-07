<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingCardholders;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a cardholder
 */
class CreateCardholder extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/issuing/cardholders";
	}


	public function __construct()
	{
	}
}
