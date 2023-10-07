<?php

namespace App\Http\Integrations\Billingo\Requests\Spending;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * SpendingDelete
 *
 * Deletes the spending identified by the ID given in path.
 */
class SpendingDelete extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/spendings/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
