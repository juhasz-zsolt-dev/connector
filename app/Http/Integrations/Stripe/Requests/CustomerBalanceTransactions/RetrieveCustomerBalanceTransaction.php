<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerBalanceTransactions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrieve a customer balance transaction
 */
class RetrieveCustomerBalanceTransaction extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/customers/{$this->customer}/balance_transactions/{$this->transaction}";
	}


	/**
	 * @param string $customer
	 * @param string $transaction
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function __construct(
		protected string $customer,
		protected string $transaction,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['expand[0]' => $this->expand0, 'expand[1]' => $this->expand1]);
	}
}
