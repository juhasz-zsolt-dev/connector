<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Misc;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Transactions
 */
class GetTransactions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/transactions";
	}


	/**
	 * @param null|string $userId (Required) ID of the User.
	 * @param null|string $accountId If specified, Transactions will be filtered by Account ID.
	 * @param null|string $status If specified, Transactions will be filtered by status.
	 * @param null|string $fromBookingDateTime The UTC ISO 8601 Date Time to filter Transactions FROM. Time component is optional - set to 00:00:00 if only the Date component is specified.
	 * @param null|string $toBookingDateTime The UTC ISO 8601 Date Time to filter Transactions TO. Time component is optional - set to 00:00:00 if only the Date component is specified.
	 * @param null|string $fromOrdinalOnAccount The ordinalOnAccount to filter the booked Transactions FROM (inclusive). If specified, only booked transactions will be returned.
	 * @param null|string $toOrdinalOnAccount The ordinalOnAccount to filter the booked Transactions FROM (inclusive). If specified, only booked transactions will be returned.
	 * @param null|string $page Transactions will be returned from this page. If the parameter is not specified the endpoint returns Transactions from the first page. A page contains maximum 200 Transactions.
	 */
	public function __construct(
		protected ?string $userId = null,
		protected ?string $accountId = null,
		protected ?string $status = null,
		protected ?string $fromBookingDateTime = null,
		protected ?string $toBookingDateTime = null,
		protected ?string $fromOrdinalOnAccount = null,
		protected ?string $toOrdinalOnAccount = null,
		protected ?string $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'userId' => $this->userId,
			'accountId' => $this->accountId,
			'status' => $this->status,
			'fromBookingDateTime' => $this->fromBookingDateTime,
			'toBookingDateTime' => $this->toBookingDateTime,
			'fromOrdinalOnAccount' => $this->fromOrdinalOnAccount,
			'toOrdinalOnAccount' => $this->toOrdinalOnAccount,
			'page' => $this->page,
		]);
	}
}
