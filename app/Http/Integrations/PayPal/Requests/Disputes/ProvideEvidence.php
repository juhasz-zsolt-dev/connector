<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Provide evidence
 */
class ProvideEvidence extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customer/disputes/{$this->disputeId}/provide-evidence";
	}


	/**
	 * @param string $disputeId
	 */
	public function __construct(
		protected string $disputeId,
	) {
	}
}
