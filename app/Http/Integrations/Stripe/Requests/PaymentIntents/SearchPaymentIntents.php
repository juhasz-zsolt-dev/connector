<?php

namespace App\Http\Integrations\Stripe\Requests\PaymentIntents;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Search PaymentIntents
 */
class SearchPaymentIntents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/payment_intents/search';
    }

    /**
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $page A cursor for pagination across multiple pages of results. Don't include this parameter on the first call. Use the next_page value returned in a previous response to request subsequent results.
     * @param  null|string  $query (Required) The search query string. See [search query language](https://stripe.com/docs/search#search-query-language) and the list of supported [query fields for payment intents](https://stripe.com/docs/search#query-fields-for-payment-intents).
     */
    public function __construct(
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $limit = null,
        protected ?string $page = null,
        protected ?string $query = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'limit' => $this->limit,
            'page' => $this->page,
            'query' => $this->query,
        ]);
    }
}
