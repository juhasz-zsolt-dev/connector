<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Accounts From Cache
 */
class GetAccountsFromCache extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user-flow/{$this->userFlowId}/accounts";
    }

    public function __construct(
        protected string $userFlowId,
    ) {
    }
}
