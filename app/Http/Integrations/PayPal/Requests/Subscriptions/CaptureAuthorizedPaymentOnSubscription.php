<?php

namespace App\Http\Integrations\PayPal\Requests\Subscriptions;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Capture authorized payment on subscription
 */
class CaptureAuthorizedPaymentOnSubscription extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/billing/subscriptions/{$this->subscriptionId}/capture";
	}


	/**
	 * @param string $subscriptionId
	 * @param null|mixed $note
	 * @param null|mixed $captureType
	 * @param null|mixed $amount
	 */
	public function __construct(
		protected string $subscriptionId,
		protected mixed $note = null,
		protected mixed $captureType = null,
		protected mixed $amount = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['note' => $this->note, 'capture_type' => $this->captureType, 'amount' => $this->amount]);
	}
}
