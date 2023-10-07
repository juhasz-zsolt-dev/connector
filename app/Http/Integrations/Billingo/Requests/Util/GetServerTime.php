<?php

namespace App\Http\Integrations\Billingo\Requests\Util;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetServerTime
 *
 * Return the server time.
 */
class GetServerTime extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/utils/time';
    }

    public function __construct()
    {
    }
}
