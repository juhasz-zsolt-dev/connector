<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Customer;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Customer
 */
class GetCustomer extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/customer";
	}


	public function __construct()
	{
	}
}
