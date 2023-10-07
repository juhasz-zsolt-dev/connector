<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Misc;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Accounts
 */
class GetAccounts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/accounts";
	}


	/**
	 * @param null|string $userId (Required) ID of the User.
	 */
	public function __construct(
		protected ?string $userId = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['userId' => $this->userId]);
	}
}
