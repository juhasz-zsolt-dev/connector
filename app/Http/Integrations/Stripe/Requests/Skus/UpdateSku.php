<?php

namespace App\Http\Integrations\Stripe\Requests\Skus;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a SKU
 */
class UpdateSku extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/skus/{$this->id}";
	}


	/**
	 * @param string $id
	 */
	public function __construct(
		protected string $id,
	) {
	}
}
