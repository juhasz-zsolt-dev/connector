<?php

namespace App\Http\Integrations\Stripe\Requests\FinancialConnectionsSessions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a Session
 */
class CreateSession extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/financial_connections/sessions';
    }

    public function __construct()
    {
    }
}
