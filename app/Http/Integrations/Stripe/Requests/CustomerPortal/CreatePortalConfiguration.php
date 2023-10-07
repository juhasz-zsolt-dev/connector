<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerPortal;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a portal configuration
 */
class CreatePortalConfiguration extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/billing_portal/configurations";
	}


	public function __construct()
	{
	}
}
