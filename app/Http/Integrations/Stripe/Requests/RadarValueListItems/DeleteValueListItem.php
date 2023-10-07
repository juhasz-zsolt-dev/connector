<?php

namespace App\Http\Integrations\Stripe\Requests\RadarValueListItems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a value list item
 */
class DeleteValueListItem extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/radar/value_list_items/{$this->item}";
    }

    public function __construct(
        protected string $item,
    ) {
    }
}
