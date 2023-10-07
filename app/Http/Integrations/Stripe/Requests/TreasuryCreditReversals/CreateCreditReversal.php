<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryCreditReversals;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a CreditReversal
 */
class CreateCreditReversal extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/treasury/credit_reversals";
	}


	public function __construct()
	{
	}
}
