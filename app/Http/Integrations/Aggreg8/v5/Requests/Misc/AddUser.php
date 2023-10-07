<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Misc;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * add User
 */
class AddUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/users';
    }

    public function __construct(
        protected mixed $id = null,
        protected mixed $email = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['_id' => $this->id, 'email' => $this->email]);
    }
}
