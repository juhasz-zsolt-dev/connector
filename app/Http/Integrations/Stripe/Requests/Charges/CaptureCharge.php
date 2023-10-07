<?php

namespace App\Http\Integrations\Stripe\Requests\Charges;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Capture a charge
 */
class CaptureCharge extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/charges/{$this->charge}/capture";
	}


	/**
	 * @param string $charge
	 */
	public function __construct(
		protected string $charge,
	) {
	}
}
