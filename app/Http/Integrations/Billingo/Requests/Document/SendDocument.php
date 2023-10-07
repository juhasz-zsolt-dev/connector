<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * SendDocument
 *
 * Returns a list of emails, where the invoice is sent.
 */
class SendDocument extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/send";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
