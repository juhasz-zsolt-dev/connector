<?php

namespace App\Http\Integrations\Billingo\Requests\Partner;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPartner
 *
 * Retrieves the details of an existing partner.
 */
class GetPartner extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/partners/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
