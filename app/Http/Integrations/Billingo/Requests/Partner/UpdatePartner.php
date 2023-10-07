<?php

namespace App\Http\Integrations\Billingo\Requests\Partner;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdatePartner
 *
 * Update an existing partner. Returns a partner object if the update is succeded.
 */
class UpdatePartner extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/partners/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
