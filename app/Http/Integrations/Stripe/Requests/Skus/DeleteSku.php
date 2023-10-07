<?php

namespace App\Http\Integrations\Stripe\Requests\Skus;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a SKU
 */
class DeleteSku extends Request
{
	protected Method $method = Method::DELETE;


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
