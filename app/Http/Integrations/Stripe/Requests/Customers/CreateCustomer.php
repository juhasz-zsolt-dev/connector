<?php

namespace App\Http\Integrations\Stripe\Requests\Customers;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a customer
 */
class CreateCustomer extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customers";
	}


	public function __construct()
	{
	}
}
