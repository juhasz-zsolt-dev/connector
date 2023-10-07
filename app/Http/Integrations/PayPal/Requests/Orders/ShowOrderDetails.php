<?php

namespace App\Http\Integrations\PayPal\Requests\Orders;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show order details
 */
class ShowOrderDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/checkout/orders/{$this->orderId}";
	}


	/**
	 * @param string $orderId
	 */
	public function __construct(
		protected string $orderId,
	) {
	}
}
