<?php

namespace App\Http\Integrations\Billingo\Requests\Spending;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * SpendingShow
 *
 * Retrives the spending identified by the given ID in path.
 */
class SpendingShow extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/spendings/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
