<?php

namespace App\Http\Integrations\Stripe\Requests\SetupIntents;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Verify microdeposits on a SetupIntent
 */
class VerifyMicrodepositsOnSetupIntent extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/setup_intents/{$this->intent}/verify_microdeposits";
	}


	/**
	 * @param string $intent
	 */
	public function __construct(
		protected string $intent,
	) {
	}
}
