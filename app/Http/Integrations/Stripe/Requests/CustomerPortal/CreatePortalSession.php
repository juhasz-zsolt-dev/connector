<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerPortal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a portal session
 */
class CreatePortalSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/billing_portal/sessions';
    }

    public function __construct()
    {
    }
}
