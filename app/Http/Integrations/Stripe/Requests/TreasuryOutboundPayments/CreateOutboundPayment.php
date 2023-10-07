<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create an OutboundPayment
 */
class CreateOutboundPayment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/treasury/outbound_payments';
    }

    public function __construct()
    {
    }
}
