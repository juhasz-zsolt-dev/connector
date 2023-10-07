<?php

namespace App\Http\Integrations\Stripe\Requests\Transfers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a transfer
 */
class CreateTransfer extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/transfers';
    }

    public function __construct()
    {
    }
}
