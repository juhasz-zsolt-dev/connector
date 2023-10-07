<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Test mode: Fail an OutboundPayment
 */
class TestModeFailOutboundPayment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/test_helpers/treasury/outbound_payments/{$this->id}/fail";
    }

    public function __construct(
        protected string $id,
    ) {
    }
}
