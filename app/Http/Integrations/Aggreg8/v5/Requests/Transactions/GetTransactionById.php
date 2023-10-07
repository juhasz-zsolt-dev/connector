<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Transactions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Transaction By Id
 */
class GetTransactionById extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/transactions/{$this->transactionId}";
	}


	/**
	 * @param string $transactionId
	 */
	public function __construct(
		protected string $transactionId,
	) {
	}
}
