<?php

namespace App\Http\Integrations\Stripe\Requests\Skus;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a SKU
 */
class CreateSku extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/skus";
	}


	public function __construct()
	{
	}
}
