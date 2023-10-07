<?php

namespace App\Http\Integrations\Stripe\Requests\Payouts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel a payout
 */
class CancelPayout extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/payouts/{$this->payout}/cancel";
    }

    public function __construct(
        protected string $payout,
    ) {
    }
}
