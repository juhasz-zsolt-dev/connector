<?php

namespace App\Http\Integrations\Billingo\Requests\Util;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CheckTaxNumber
 *
 * Check the given tax number format, and NAV validate.
 */
class CheckTaxNumber extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/utils/check-tax-number/{$this->taxNumber}";
    }

    public function __construct(
        protected string $taxNumber,
    ) {
    }
}
