<?php

namespace App\Http\Integrations\Stripe\Requests\Persons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a person
 */
class DeletePerson extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/accounts/{$this->account}/persons/{$this->person}";
    }

    public function __construct(
        protected string $account,
        protected string $person,
    ) {
    }
}
