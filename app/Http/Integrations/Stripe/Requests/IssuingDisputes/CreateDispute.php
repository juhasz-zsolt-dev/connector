<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingDisputes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a dispute
 */
class CreateDispute extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/issuing/disputes';
    }

    public function __construct()
    {
    }
}
