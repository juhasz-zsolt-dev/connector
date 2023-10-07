<?php

namespace App\Http\Integrations\Stripe\Requests\TestClocks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Advance a test clock
 */
class AdvanceTestClock extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/test_helpers/test_clocks/{$this->testClock}/advance";
    }

    public function __construct(
        protected string $testClock,
    ) {
    }
}
