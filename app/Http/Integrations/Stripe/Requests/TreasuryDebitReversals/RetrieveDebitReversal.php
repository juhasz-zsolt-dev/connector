<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryDebitReversals;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrieve a DebitReversal
 */
class RetrieveDebitReversal extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/treasury/debit_reversals/{$this->debitReversal}";
	}


	/**
	 * @param string $debitReversal
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function __construct(
		protected string $debitReversal,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['expand[0]' => $this->expand0, 'expand[1]' => $this->expand1]);
	}
}
