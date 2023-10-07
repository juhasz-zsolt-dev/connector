<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingCards;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Return a testmode card
 */
class ReturnTestmodeCard extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/test_helpers/issuing/cards/{$this->card}/shipping/return";
	}


	/**
	 * @param string $card
	 */
	public function __construct(
		protected string $card,
	) {
	}
}
