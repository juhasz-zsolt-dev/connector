<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Escalate dispute to claim
 */
class EscalateDisputeToClaim extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customer/disputes/{$this->disputeId}/escalate";
	}


	/**
	 * @param string $disputeId
	 * @param null|mixed $note
	 */
	public function __construct(
		protected string $disputeId,
		protected mixed $note = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['note' => $this->note]);
	}
}
