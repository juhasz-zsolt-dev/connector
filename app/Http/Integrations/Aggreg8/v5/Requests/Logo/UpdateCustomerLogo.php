<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Logo;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * update Customer Logo
 */
class UpdateCustomerLogo extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/customer/logo';
    }

    public function __construct(
        protected mixed $dataUri = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['dataUri' => $this->dataUri]);
    }
}
