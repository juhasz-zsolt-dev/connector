<?php

namespace App\Http\Integrations\Stripe\Requests\Accounts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all account capabilities
 */
class ListAllAccountCapabilities extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/accounts/{$this->account}/capabilities";
	}


	/**
	 * @param string $account
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function __construct(
		protected string $account,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['expand[0]' => $this->expand0, 'expand[1]' => $this->expand1]);
	}
}
