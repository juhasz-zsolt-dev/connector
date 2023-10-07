<?php

namespace App\Http\Integrations\Billingo\Requests\BankAccount;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdateBankAccount
 *
 * Update an existing bank accounts. Returns a bank account object if the update is succeded.
 */
class UpdateBankAccount extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/bank-accounts/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
