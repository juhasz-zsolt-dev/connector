<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingCards;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a card
 */
class CreateCard extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/issuing/cards";
	}


	public function __construct()
	{
	}
}
