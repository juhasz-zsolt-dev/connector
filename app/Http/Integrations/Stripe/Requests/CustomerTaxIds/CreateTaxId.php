<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerTaxIds;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a tax ID
 */
class CreateTaxId extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customers/{$this->customer}/tax_ids";
	}


	/**
	 * @param string $customer
	 */
	public function __construct(
		protected string $customer,
	) {
	}
}
