<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Send message about dispute to other party
 */
class SendMessageAboutDisputeToOtherParty extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/customer/disputes/{$this->disputeId}/send-message";
	}


	/**
	 * @param string $disputeId
	 * @param null|mixed $message
	 */
	public function __construct(
		protected string $disputeId,
		protected mixed $message = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['message' => $this->message]);
	}
}
