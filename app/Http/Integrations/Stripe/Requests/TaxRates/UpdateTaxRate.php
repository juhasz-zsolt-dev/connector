<?php

namespace App\Http\Integrations\Stripe\Requests\TaxRates;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a tax rate
 */
class UpdateTaxRate extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/tax_rates/{$this->taxRate}";
    }

    public function __construct(
        protected string $taxRate,
    ) {
    }
}
