<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\State;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get User Flow
 */
class GetUserFlow extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user-flow/{$this->userFlowId}/state";
    }

    public function __construct(
        protected string $userFlowId,
    ) {
    }
}
