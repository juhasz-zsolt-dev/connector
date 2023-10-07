<?php

namespace App\Http\Integrations\Stripe\Requests\CustomerTaxIds;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a tax ID
 */
class DeleteTaxId extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/v1/customers/{$this->customer}/tax_ids/{$this->id}";
    }

    public function __construct(
        protected string $customer,
        protected string $id,
    ) {
    }
}
