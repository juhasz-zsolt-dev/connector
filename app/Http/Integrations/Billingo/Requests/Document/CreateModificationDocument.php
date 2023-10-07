<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateModificationDocument
 *
 * Create a modification document for the given document. Returns a new document object if the create
 * is successful.
 */
class CreateModificationDocument extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/create-modification-document";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
