<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * DocumentCopy
 *
 * Copy a document. Returns the new document if the copy was succeded.
 */
class DocumentCopy extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/copy";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
