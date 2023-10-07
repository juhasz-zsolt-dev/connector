<?php

namespace App\Http\Integrations\Stripe\Requests\Quotes;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel a quote
 */
class CancelQuote extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/quotes/{$this->quote}/cancel";
	}


	/**
	 * @param string $quote
	 */
	public function __construct(
		protected string $quote,
	) {
	}
}
