<?php

namespace App\Http\Integrations\Stripe\Requests\TerminalReaders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel the current reader action
 */
class CancelTheCurrentReaderAction extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/terminal/readers/{$this->reader}/cancel_action";
    }

    public function __construct(
        protected string $reader,
    ) {
    }
}
