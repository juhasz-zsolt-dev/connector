<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalReaders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a reader
 */
class CreateReader extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/terminal/readers';
    }

    public function __construct()
    {
    }
}
