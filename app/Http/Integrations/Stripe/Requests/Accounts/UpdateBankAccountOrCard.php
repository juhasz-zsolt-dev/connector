<?php

namespace App\Http\Integrations\Stripe\Requests\Accounts;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a bank account or card
 */
class UpdateBankAccountOrCard extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


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
