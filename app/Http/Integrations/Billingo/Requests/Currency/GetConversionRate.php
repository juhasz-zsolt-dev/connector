<?php

namespace App\Http\Integrations\Billingo\Requests\Currency;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetConversionRate
 *
 * Return with the exchange value of given currencies.
 */
class GetConversionRate extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/currencies';
    }

    public function __construct(
        protected string $from,
        protected string $to,
        protected ?string $date = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['from' => $this->from, 'to' => $this->to, 'date' => $this->date]);
    }
}
