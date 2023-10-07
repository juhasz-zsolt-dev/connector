<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalConnectionTokens;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a connection token
 */
class CreateConnectionToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/terminal/connection_tokens';
    }

    public function __construct()
    {
    }
}
