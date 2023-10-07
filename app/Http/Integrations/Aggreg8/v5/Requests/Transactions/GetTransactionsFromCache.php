<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Transactions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Transactions From Cache
 */
class GetTransactionsFromCache extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/user-flow/{$this->userFlowId}/transactions";
	}


	/**
	 * @param string $userFlowId
	 * @param null|string $accountId If specified, Transactions will be filtered by account ID.
	 * @param null|string $status If specified, Transactions will be filtered by status.
	 * @param null|string $page Transactions will be returned from this page. If the parameter is not specified the endpoint returns Transactions from the first page. A page contains maximum 200 transactions.
	 */
	public function __construct(
		protected string $userFlowId,
		protected ?string $accountId = null,
		protected ?string $status = null,
		protected ?string $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['accountId' => $this->accountId, 'status' => $this->status, 'page' => $this->page]);
	}
}
