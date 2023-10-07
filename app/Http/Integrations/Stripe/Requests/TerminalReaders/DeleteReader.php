<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalReaders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a reader
 */
class DeleteReader extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/terminal/readers/{$this->reader}";
    }

    public function __construct(
        protected string $reader,
    ) {
    }
}
