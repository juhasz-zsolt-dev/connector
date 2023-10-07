<?php

namespace App\Http\Integrations\Stripe\Requests\Accounts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete an account
 */
class DeleteAccount extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v1/accounts/{$this->account}";
	}


	/**
	 * @param string $account
	 */
	public function __construct(
		protected string $account,
	) {
	}
}
