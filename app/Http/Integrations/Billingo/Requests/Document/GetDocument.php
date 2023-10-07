<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetDocument
 *
 * Retrieves the details of an existing document.
 */
class GetDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
