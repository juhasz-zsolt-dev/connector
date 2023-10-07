<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryInboundTransfers;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel an InboundTransfers
 */
class CancelInboundTransfers extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/treasury/inbound_transfers/{$this->inboundTransfer}/cancel";
	}


	/**
	 * @param string $inboundTransfer
	 */
	public function __construct(
		protected string $inboundTransfer,
	) {
	}
}
