<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryReceivedCredits;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Test mode: Create a ReceivedCret
 */
class TestModeCreateReceivedCret extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/test_helpers/treasury/received_credits';
    }

    public function __construct()
    {
    }
}
