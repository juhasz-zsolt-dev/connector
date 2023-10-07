<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Categories
 */
class GetCategories extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/categories';
    }

    public function __construct()
    {
    }
}
