<?php

namespace App\Http\Integrations\Stripe\Requests\Accounts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a bank account or card
 */
class DeleteBankAccountOrCard extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v1/accounts/{$this->account}/external_accounts/{$this->id}";
	}


	/**
	 * @param string $account
	 * @param string $id
	 */
	public function __construct(
		protected string $account,
		protected string $id,
	) {
	}
}
