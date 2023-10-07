<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Health;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * health
 */
class Health extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/health";
	}


	public function __construct()
	{
	}
}
