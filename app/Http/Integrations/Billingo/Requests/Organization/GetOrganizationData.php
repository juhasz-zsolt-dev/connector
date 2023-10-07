<?php

namespace App\Http\Integrations\Billingo\Requests\Organization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetOrganizationData
 *
 * Retrieves the data of organization.
 */
class GetOrganizationData extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/organization';
    }

    public function __construct()
    {
    }
}
