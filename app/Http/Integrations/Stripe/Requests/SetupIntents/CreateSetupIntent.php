<?php

namespace App\Http\Integrations\Stripe\Requests\SetupIntents;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a SetupIntent
 */
class CreateSetupIntent extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/setup_intents";
	}


	public function __construct()
	{
	}
}
