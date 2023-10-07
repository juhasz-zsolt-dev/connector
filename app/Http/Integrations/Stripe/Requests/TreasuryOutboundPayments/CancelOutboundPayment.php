<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel an OutboundPayment
 */
class CancelOutboundPayment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/treasury/outbound_payments/{$this->id}/cancel";
    }

    public function __construct(
        protected string $id,
    ) {
    }
}
