<?php

namespace App\Http\Integrations\Stripe\Requests\Customers;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a customer
 */
class DeleteCustomer extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v1/customers/{$this->customer}";
	}


	/**
	 * @param string $customer
	 */
	public function __construct(
		protected string $customer,
	) {
	}
}
