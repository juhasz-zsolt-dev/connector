<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetOnlineSzamlaStatus
 *
 * Retrieves the details of an existing document status.
 */
class GetOnlineSzamlaStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/online-szamla";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
