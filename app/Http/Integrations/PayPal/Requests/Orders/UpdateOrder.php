<?php

namespace App\Http\Integrations\PayPal\Requests\Orders;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update order
 */
class UpdateOrder extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/v2/checkout/orders/{$this->orderId}";
	}


	/**
	 * @param string $orderId
	 * @param null|array $values
	 */
	public function __construct(
		protected string $orderId,
		protected ?array $values = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['values' => $this->values]);
	}
}
