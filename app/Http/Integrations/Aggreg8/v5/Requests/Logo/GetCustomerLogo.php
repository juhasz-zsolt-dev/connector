<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Logo;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Customer Logo
 */
class GetCustomerLogo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/customer/logo';
    }

    public function __construct()
    {
    }
}
