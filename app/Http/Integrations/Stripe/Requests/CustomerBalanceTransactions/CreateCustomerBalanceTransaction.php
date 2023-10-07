<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerBalanceTransactions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a customer balance transaction
 */
class CreateCustomerBalanceTransaction extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customers/{$this->customer}/balance_transactions";
	}


	/**
	 * @param string $customer
	 */
	public function __construct(
		protected string $customer,
	) {
	}
}
