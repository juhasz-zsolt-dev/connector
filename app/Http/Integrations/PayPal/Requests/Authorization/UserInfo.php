<?php

namespace App\Http\Integrations\PayPal\Requests\Authorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * User Info
 */
class UserInfo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/identity/oauth2/userinfo';
    }

    /**
     * @param  null|string  $schema (Required) Filters the response by a schema. Supported value is `paypalv1.1`.
     */
    public function __construct(
        protected ?string $schema = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['schema' => $this->schema]);
    }
}
