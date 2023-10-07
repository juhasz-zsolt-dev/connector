<?php

namespace App\Http\Integrations\PayPal\Requests\Authorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Terminate access_token
 */
class TerminateAccessToken extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/oauth2/token/terminate';
    }

    public function __construct()
    {
    }
}
