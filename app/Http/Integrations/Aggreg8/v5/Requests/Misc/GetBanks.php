<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Banks
 */
class GetBanks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/banks';
    }

    public function __construct()
    {
    }
}
