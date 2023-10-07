<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List invoices
 */
class ListInvoices extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v2/invoicing/invoices';
    }

    /**
     * @param  null|string  $page The page number to be retrieved, for the list of items. So, a combination of `page=1` and `page_size=20` returns the first 20 invoices. A combination of `page=2` and `page_size=20` returns the next 20 invoices.
     * @param  null|string  $pageSize The maximum number of invoices to return in the response.
     * @param  null|string  $totalRequired Indicates whether the to show <code>total_pages</code> and <code>total_items</code> in the response.
     * @param  null|string  $fields A comma-separated list of additional fields to return, if available.
     */
    public function __construct(
        protected ?string $page = null,
        protected ?string $pageSize = null,
        protected ?string $totalRequired = null,
        protected ?string $fields = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'page_size' => $this->pageSize,
            'total_required' => $this->totalRequired,
            'fields' => $this->fields,
        ]);
    }
}
