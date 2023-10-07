<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Token;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Token
 */
class GetToken extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/token";
	}


	public function __construct()
	{
	}
}
