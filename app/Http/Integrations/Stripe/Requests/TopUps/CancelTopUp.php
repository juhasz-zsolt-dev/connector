<?php

namespace App\Http\Integrations\Stripe\Requests\TopUps;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel a top-up
 */
class CancelTopUp extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/topups/{$this->topup}/cancel";
    }

    public function __construct(
        protected string $topup,
    ) {
    }
}
