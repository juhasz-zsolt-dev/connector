<?php

namespace App\Http\Integrations\Billingo\Requests\BankAccount;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetBankAccount
 *
 * Retrieves the details of an existing bank account.
 */
class GetBankAccount extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/bank-accounts/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
