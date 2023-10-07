<?php

namespace App\Http\Integrations\Stripe\Requests\TestClocks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a test clock
 */
class DeleteTestClock extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/test_helpers/test_clocks/{$this->testClock}";
    }

    public function __construct(
        protected string $testClock,
    ) {
    }
}
