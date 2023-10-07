<?php

namespace App\Http\Integrations\Stripe\Requests\TestClocks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a test clock
 */
class CreateTestClock extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/test_helpers/test_clocks';
    }

    public function __construct()
    {
    }
}
