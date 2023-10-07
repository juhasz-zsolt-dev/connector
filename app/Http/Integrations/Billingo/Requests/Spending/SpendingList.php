<?php

namespace App\Http\Integrations\Billingo\Requests\Spending;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * SpendingList
 *
 * Returns a list of your spending items, ordered by the due date.
 */
class SpendingList extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/spendings';
    }

    public function __construct(
        protected ?string $q = null,
        protected ?int $page = null,
        protected ?string $spendingDate = null,
        protected ?string $startDate = null,
        protected ?string $endDate = null,
        protected ?string $paymentStatus = null,
        protected ?string $spendingType = null,
        protected ?string $categories = null,
        protected ?string $currencies = null,
        protected ?string $paymentMethods = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'q' => $this->q,
            'page' => $this->page,
            'spending_date' => $this->spendingDate,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'payment_status' => $this->paymentStatus,
            'spending_type' => $this->spendingType,
            'categories' => $this->categories,
            'currencies' => $this->currencies,
            'payment_methods' => $this->paymentMethods,
        ]);
    }
}
