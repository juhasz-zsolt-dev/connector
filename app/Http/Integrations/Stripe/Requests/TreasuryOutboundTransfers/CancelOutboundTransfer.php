<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel an OutboundTransfer
 */
class CancelOutboundTransfer extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/treasury/outbound_transfers/{$this->outboundTransfer}/cancel";
	}


	/**
	 * @param string $outboundTransfer
	 */
	public function __construct(
		protected string $outboundTransfer,
	) {
	}
}
