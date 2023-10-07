<?php

namespace App\Http\Integrations\PayPal\Requests\Authorization;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Generate access_token
 */
class GenerateAccessToken extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/oauth2/token";
	}


	public function __construct()
	{
	}
}
