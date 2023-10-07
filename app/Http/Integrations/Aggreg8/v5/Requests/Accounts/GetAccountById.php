<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Account By Id
 */
class GetAccountById extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/accounts/{$this->accountId}";
    }

    public function __construct(
        protected string $accountId,
    ) {
    }
}
