<?php

namespace App\Http\Integrations\Stripe\Requests\SecretManagement;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Delete a secret
 */
class DeleteSecret extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/apps/secrets/delete';
    }

    public function __construct()
    {
    }
}
