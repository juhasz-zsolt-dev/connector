<?php

namespace App\Http\Integrations\PayPal\Requests\Payouts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show payout batch details
 */
class ShowPayoutBatchDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/payments/payouts/{$this->payoutBatchId}";
    }

    /**
     * @param  null|string  $fields Shows details for only the specified fields.
     * @param  null|string  $page A non-zero integer representing the page of the results.
     * @param  null|string  $pageSize The maximum number of results to return at one time. Value is a non-negative, non-zero integer. If the user chooses pagination, the maximum page is `1000`.
     * @param  null|string  $totalRequired Indicates whether to show the total items and total pages count in the response.
     */
    public function __construct(
        protected string $payoutBatchId,
        protected ?string $fields = null,
        protected ?string $page = null,
        protected ?string $pageSize = null,
        protected ?string $totalRequired = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'fields' => $this->fields,
            'page' => $this->page,
            'page_size' => $this->pageSize,
            'total_required' => $this->totalRequired,
        ]);
    }
}
