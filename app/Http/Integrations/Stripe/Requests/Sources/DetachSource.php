<?php

namespace App\Http\Integrations\Stripe\Requests\Sources;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Detach a source
 */
class DetachSource extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/customers/{$this->customer}/sources/{$this->id}";
    }

    public function __construct(
        protected string $customer,
        protected string $id,
    ) {
    }
}
