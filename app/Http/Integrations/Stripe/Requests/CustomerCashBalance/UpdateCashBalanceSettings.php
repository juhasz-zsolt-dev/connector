<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerCashBalance;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a cash balance's settings
 */
class UpdateCashBalanceSettings extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customers/{$this->customer}/cash_balance";
	}


	/**
	 * @param string $customer
	 */
	public function __construct(
		protected string $customer,
	) {
	}
}
