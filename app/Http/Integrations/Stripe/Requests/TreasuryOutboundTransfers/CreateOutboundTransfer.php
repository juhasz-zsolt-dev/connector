<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create an OutboundTransfer
 */
class CreateOutboundTransfer extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/treasury/outbound_transfers';
    }

    public function __construct()
    {
    }
}
