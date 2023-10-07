<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Swagger;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Swagger Definition
 */
class GetSwaggerDefinition extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/swagger";
	}


	public function __construct()
	{
	}
}
