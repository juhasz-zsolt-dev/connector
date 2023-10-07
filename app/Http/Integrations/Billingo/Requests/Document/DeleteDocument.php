<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteDocument
 *
 * Delete an existing draft.
 */
class DeleteDocument extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
