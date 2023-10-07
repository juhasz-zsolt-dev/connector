<?php

namespace App\Http\Integrations\Billingo\Requests\BankAccount;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteBankAccount
 *
 * Delete an existing bank account.
 */
class DeleteBankAccount extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/bank-accounts/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
