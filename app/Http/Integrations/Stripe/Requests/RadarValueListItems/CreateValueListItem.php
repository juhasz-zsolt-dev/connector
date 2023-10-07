<?php

namespace App\Http\Integrations\Stripe\Requests\RadarValueListItems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a value list item
 */
class CreateValueListItem extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/radar/value_list_items';
    }

    public function __construct()
    {
    }
}
