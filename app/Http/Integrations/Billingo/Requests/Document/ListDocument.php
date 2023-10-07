<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListDocument
 *
 * Returns a list of your documents. The documents are returned sorted by creation date, with the most
 * recent documents appearing first.
 */
class ListDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/documents';
    }

    /**
     * @param  null|int  $blockId Filter documents by the identifier of your DocumentBlock.
     * @param  null|int  $partnerId Filter documents by the identifier of your Partner.
     * @param  null|string  $paymentMethod Filter documents by PaymentMethod value.
     * @param  null|string  $paymentStatus Filter documents by PaymentStatus value.
     * @param  null|string  $startDate Filter documents by their invoice date.
     * @param  null|string  $endDate Filter documents by their invoice date.
     * @param  null|int  $startNumber Starting number of the document, should not contain year or any other formatting. Required if `start_year` given
     * @param  null|int  $endNumber Ending number of the document, should not contain year or any other formatting. Required if `end_year` given
     * @param  null|int  $startYear Year for `start_number` parameter. Required if `start_number` given.
     * @param  null|int  $endYear Year for `end_number` parameter. Required if `end_number` given.
     * @param  null|string  $type Filter documents by type
     * @param  null|string  $query Filter documents by the given text
     * @param  null|string  $paidStartDate Filter documents by their payment date.
     * @param  null|string  $paidEndDate Filter documents by their payment date.
     * @param  null|string  $fulfillmentStartDate Filter documents by their fulfillment date.
     * @param  null|string  $fulfillmentEndDate Filter documents by their fulfillment date.
     * @param  null|string  $lastModifiedDate Filter documents by their last modified date.
     */
    public function __construct(
        protected ?int $page = 1,
        protected ?int $perPage = 25,
        protected ?int $blockId = null,
        protected ?int $partnerId = null,
        protected ?string $paymentMethod = null,
        protected ?string $paymentStatus = null,
        protected ?string $startDate = null,
        protected ?string $endDate = null,
        protected ?int $startNumber = null,
        protected ?int $endNumber = null,
        protected ?int $startYear = null,
        protected ?int $endYear = null,
        protected ?string $type = null,
        protected ?string $query = null,
        protected ?string $paidStartDate = null,
        protected ?string $paidEndDate = null,
        protected ?string $fulfillmentStartDate = null,
        protected ?string $fulfillmentEndDate = null,
        protected ?string $lastModifiedDate = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'per_page' => $this->perPage,
            'block_id' => $this->blockId,
            'partner_id' => $this->partnerId,
            'payment_method' => $this->paymentMethod,
            'payment_status' => $this->paymentStatus,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'start_number' => $this->startNumber,
            'end_number' => $this->endNumber,
            'start_year' => $this->startYear,
            'end_year' => $this->endYear,
            'type' => $this->type,
            'query' => $this->query,
            'paid_start_date' => $this->paidStartDate,
            'paid_end_date' => $this->paidEndDate,
            'fulfillment_start_date' => $this->fulfillmentStartDate,
            'fulfillment_end_date' => $this->fulfillmentEndDate,
            'last_modified_date' => $this->lastModifiedDate,
        ]);
    }
}
