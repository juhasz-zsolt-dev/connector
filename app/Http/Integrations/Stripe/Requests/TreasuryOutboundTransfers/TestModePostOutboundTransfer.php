<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Test mode: Post an OutboundTransfer
 */
class TestModePostOutboundTransfer extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/test_helpers/treasury/outbound_transfers/{$this->outboundTransfer}/post";
    }

    public function __construct(
        protected string $outboundTransfer,
    ) {
    }
}
