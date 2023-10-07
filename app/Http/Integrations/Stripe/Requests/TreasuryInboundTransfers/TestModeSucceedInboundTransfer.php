<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryInboundTransfers;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Test mode: Succeed an InboundTransfer
 */
class TestModeSucceedInboundTransfer extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/test_helpers/treasury/inbound_transfers/{$this->id}/succeed";
	}


	/**
	 * @param string $id
	 */
	public function __construct(
		protected string $id,
	) {
	}
}
