<?php

namespace App\Http\Integrations\Stripe\Requests\Quotes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Accept a quote
 */
class AcceptQuote extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/quotes/{$this->quote}/accept";
    }

    public function __construct(
        protected string $quote,
    ) {
    }
}
