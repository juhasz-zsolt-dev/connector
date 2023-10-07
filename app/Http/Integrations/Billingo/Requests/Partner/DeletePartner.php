<?php

namespace App\Http\Integrations\Billingo\Requests\Partner;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePartner
 *
 * Delete an existing partner.
 */
class DeletePartner extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/partners/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
