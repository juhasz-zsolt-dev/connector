<?php

namespace App\Http\Integrations\Stripe\Requests\Identity;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a VerificationSession
 */
class CreateVerificationSession extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/identity/verification_sessions";
	}


	public function __construct()
	{
	}
}
