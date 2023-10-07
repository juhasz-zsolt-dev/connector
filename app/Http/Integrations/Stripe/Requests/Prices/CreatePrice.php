<?php

namespace App\Http\Integrations\Stripe\Requests\Prices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a price
 */
class CreatePrice extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/prices';
    }

    public function __construct()
    {
    }
}
