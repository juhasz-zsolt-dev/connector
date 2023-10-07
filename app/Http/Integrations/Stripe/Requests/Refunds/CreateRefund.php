<?php

namespace App\Http\Integrations\Stripe\Requests\Refunds;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a refund
 */
class CreateRefund extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/refunds';
    }

    public function __construct()
    {
    }
}
