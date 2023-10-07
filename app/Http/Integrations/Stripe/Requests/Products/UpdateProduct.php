<?php

namespace App\Http\Integrations\Stripe\Requests\Products;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a product
 */
class UpdateProduct extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/products/{$this->id}";
	}


	/**
	 * @param string $id
	 */
	public function __construct(
		protected string $id,
	) {
	}
}
