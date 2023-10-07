<?php

namespace App\Http\Integrations\Billingo\Requests\Spending;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * SpendingUpdate
 *
 * Updates the spending item identified by the ID given in path.
 */
class SpendingUpdate extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/spendings/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
