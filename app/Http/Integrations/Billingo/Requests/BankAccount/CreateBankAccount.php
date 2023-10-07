<?php

namespace App\Http\Integrations\Billingo\Requests\BankAccount;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateBankAccount
 *
 * Create a new bank account. Returns a bank account object if the create is succeded.
 */
class CreateBankAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/bank-accounts';
    }

    public function __construct()
    {
    }
}
