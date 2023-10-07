<?php

namespace App\Http\Integrations\Stripe\Requests\Files;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a file
 */
class CreateFile extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/files';
    }

    public function __construct()
    {
    }
}
