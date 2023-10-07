<?php

namespace App\Http\Integrations\Stripe\Requests\Payouts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a payout
 */
class CreatePayout extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/payouts';
    }

    public function __construct()
    {
    }
}
