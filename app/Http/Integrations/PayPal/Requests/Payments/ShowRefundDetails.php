<?php

namespace App\Http\Integrations\PayPal\Requests\Payments;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show refund details
 */
class ShowRefundDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/payments/refunds/{$this->refundId}";
	}


	/**
	 * @param string $refundId
	 */
	public function __construct(
		protected string $refundId,
	) {
	}
}
