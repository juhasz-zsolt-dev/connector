<?php

namespace App\Http\Integrations\PayPal\Requests\Payments;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show captured payment details
 */
class ShowCapturedPaymentDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/payments/captures/{$this->captureId}";
	}


	/**
	 * @param string $captureId
	 */
	public function __construct(
		protected string $captureId,
	) {
	}
}
