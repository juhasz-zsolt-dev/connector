<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CreateDocumentFromDraft
 *
 * Converts a draft to an invoice. Returns the invoice object if the convert is succeded.
 */
class CreateDocumentFromDraft extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
