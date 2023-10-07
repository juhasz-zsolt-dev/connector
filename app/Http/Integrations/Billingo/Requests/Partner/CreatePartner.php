<?php

namespace App\Http\Integrations\Billingo\Requests\Partner;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreatePartner
 *
 * Create a new partner. Returns a partner object if the create is succeded.
 */
class CreatePartner extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/partners';
    }

    public function __construct()
    {
    }
}
