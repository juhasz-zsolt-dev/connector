<?php

namespace App\Http\Integrations\Stripe\Requests\Persons;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a person
 */
class UpdatePerson extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

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
