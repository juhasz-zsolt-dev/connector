<?php

namespace App\Http\Integrations\Billingo\Requests\Partner;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPartner
 *
 * Returns a list of your partners. The partners are returned sorted by creation date, with the most
 * recent partners appearing first.
 */
class ListPartner extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/partners';
    }

    public function __construct(
        protected ?int $page = 1,
        protected ?int $perPage = 25,
        protected ?string $partnerQuery = '',
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'perPage' => $this->perPage,
            'query' => $this->partnerQuery,
        ]);
    }
}
