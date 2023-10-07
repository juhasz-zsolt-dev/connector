<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPublicUrl
 *
 * Retrieves public url to download an existing document.
 */
class GetPublicUrl extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/public-url";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
