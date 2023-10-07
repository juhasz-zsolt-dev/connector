<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ArchiveDocument
 *
 * Archive an existing proforma document.
 */
class ArchiveDocument extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/archive";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
