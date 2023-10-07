<?php

namespace App\Http\Integrations\Stripe\Requests\Coupons;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a coupon
 */
class DeleteCoupon extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v1/coupons/{$this->coupon}";
	}


	/**
	 * @param string $coupon
	 */
	public function __construct(
		protected string $coupon,
	) {
	}
}
