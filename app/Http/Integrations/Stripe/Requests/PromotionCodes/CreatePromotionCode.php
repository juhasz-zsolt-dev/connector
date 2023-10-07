<?php

namespace App\Http\Integrations\Stripe\Requests\PromotionCodes;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a promotion code
 */
class CreatePromotionCode extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/promotion_codes";
	}


	public function __construct()
	{
	}
}
