<?php

namespace App\Http\Integrations\Stripe\Requests\Tokens;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a token
 */
class CreateToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/tokens';
    }

    public function __construct()
    {
    }
}
