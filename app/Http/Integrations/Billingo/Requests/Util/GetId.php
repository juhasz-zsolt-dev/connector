<?php

namespace App\Http\Integrations\Billingo\Requests\Util;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetId
 *
 * Retrieves the API v3 ID.
 */
class GetId extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/utils/convert-legacy-id/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
