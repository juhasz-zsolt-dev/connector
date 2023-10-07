<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryReceivedDebits;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Test mode: Create a ReceivedDebit
 */
class TestModeCreateReceivedDebit extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/test_helpers/treasury/received_debits";
	}


	public function __construct()
	{
	}
}
