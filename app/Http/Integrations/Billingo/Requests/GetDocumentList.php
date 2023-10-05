<?php

namespace App\Http\Integrations\Billingo\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetDocumentList extends Request
{
    public function __construct(
        protected int $page,
        protected int $per_page,
        protected string|null $payment_method,
        protected string|null $payment_status,
        protected string $start_date,
        protected string $end_date,
        protected int $start_number,
        protected int $end_number,
        protected int|null $start_year,
        protected int|null $end_year,
        protected string $type,
        protected string|null $paid_start_date,
        protected string|null $paid_end_date,
        protected string|null $fulfillment_start_date,
        protected string|null $fulfillment_end_date,
        protected string|null $last_modified_date,
    ){
    }
    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/documents';
    }

    protected function defaultQuery(): array
    {
        return [
            'page' => $this->page,
            'per_page' => $this->per_page,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'start_number' => $this->start_number,
            'end_number' => $this->end_number,
            'start_year' => $this->start_year,
            'end_year' => $this->end_year,
            'type' => $this->type,
            'paid_start_date' => $this->paid_start_date,
            'paid_end_date' => $this->paid_end_date,
            'fulfillment_start_date' => $this->fulfillment_start_date,
            'fulfillment_end_date' => $this->fulfillment_end_date,
            'last_modified_date' => $this->last_modified_date,
        ];
    }
}
