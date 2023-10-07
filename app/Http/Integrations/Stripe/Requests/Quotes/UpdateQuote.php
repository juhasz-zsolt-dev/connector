<?php

namespace App\Http\Integrations\Stripe\Requests\Quotes;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a quote
 */
class UpdateQuote extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/quotes/{$this->quote}";
	}


	/**
	 * @param string $quote
	 */
	public function __construct(
		protected string $quote,
	) {
	}
}
