<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingCardholders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a cardholder
 */
class UpdateCardholder extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/issuing/cardholders/{$this->cardholder}";
    }

    public function __construct(
        protected string $cardholder,
    ) {
    }
}
