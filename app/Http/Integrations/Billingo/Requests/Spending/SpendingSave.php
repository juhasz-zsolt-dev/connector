<?php

namespace App\Http\Integrations\Billingo\Requests\Spending;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * SpendingSave
 */
class SpendingSave extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/spendings';
    }

    public function __construct()
    {
    }
}
