<?php

namespace App\Http\Integrations\Stripe\Requests\RadarValueList;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a value list
 */
class DeleteValueList extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/radar/value_lists/{$this->valueList}";
    }

    public function __construct(
        protected string $valueList,
    ) {
    }
}
