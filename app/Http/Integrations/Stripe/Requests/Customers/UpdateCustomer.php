<?php

namespace App\Http\Integrations\Stripe\Requests\Customers;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a customer
 */
class UpdateCustomer extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/customers/{$this->customer}";
    }

    public function __construct(
        protected string $customer,
    ) {
    }
}
