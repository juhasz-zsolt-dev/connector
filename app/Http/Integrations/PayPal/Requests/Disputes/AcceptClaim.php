<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Accept claim
 */
class AcceptClaim extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customer/disputes/{$this->disputeId}/accept-claim";
	}


	/**
	 * @param string $disputeId
	 * @param null|mixed $note
	 * @param null|mixed $acceptClaimReason
	 * @param null|mixed $acceptClaimType
	 */
	public function __construct(
		protected string $disputeId,
		protected mixed $note = null,
		protected mixed $acceptClaimReason = null,
		protected mixed $acceptClaimType = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'note' => $this->note,
			'accept_claim_reason' => $this->acceptClaimReason,
			'accept_claim_type' => $this->acceptClaimType,
		]);
	}
}
