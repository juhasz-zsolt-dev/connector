<?php

namespace App\Http\Integrations\Covid19\Requests\Report;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * total
 */
class Total extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reports/total';
    }

    /**
     * @param  null|string  $date The date of report in the format Y-m-d | default last added date
     * @param  null|string  $iso Filter by country ISO code
     */
    public function __construct(
        protected ?string $date = null,
        protected ?string $iso = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['date' => $this->date, 'iso' => $this->iso]);
    }
}
