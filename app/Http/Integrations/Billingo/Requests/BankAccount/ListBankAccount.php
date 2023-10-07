<?php

namespace App\Http\Integrations\Billingo\Requests\BankAccount;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListBankAccount
 *
 * Returns a list of your bank accounts. The bank accounts are returned sorted by creation date, with
 * the most recent bank account appearing first.
 */
class ListBankAccount extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/bank-accounts';
    }

    public function __construct(
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page]);
    }
}
