<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalReaders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Set reader display
 */
class SetReaderDisplay extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/terminal/readers/{$this->reader}/set_reader_display";
    }

    public function __construct(
        protected string $reader,
    ) {
    }
}
