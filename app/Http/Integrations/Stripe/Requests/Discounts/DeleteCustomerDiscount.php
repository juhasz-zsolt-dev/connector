<?php

namespace App\Http\Integrations\Stripe\Requests\Discounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a customer discount
 */
class DeleteCustomerDiscount extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/customers/{$this->customer}/discount";
    }

    public function __construct(
        protected string $customer,
    ) {
    }
}
