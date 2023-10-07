<?php

namespace App\Http\Integrations\Stripe\Requests\Payouts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a payout
 */
class UpdatePayout extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/payouts/{$this->payout}";
    }

    public function __construct(
        protected string $payout,
    ) {
    }
}
