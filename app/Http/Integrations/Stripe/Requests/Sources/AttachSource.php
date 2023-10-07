<?php

namespace App\Http\Integrations\Stripe\Requests\Sources;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Attach a source
 */
class AttachSource extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customers/{$this->customer}/sources";
	}


	/**
	 * @param string $customer
	 */
	public function __construct(
		protected string $customer,
	) {
	}
}
