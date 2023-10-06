<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetList extends Request
{
    public function __construct(
        protected int $page,
        protected int $per_page,
        protected ?string $payment_method,
        protected ?string $payment_status,
        protected string $start_date,
        protected string $end_date,
        protected int $start_number,
        protected int $end_number,
        protected ?int $start_year,
        protected ?int $end_year,
        protected string $type,
        protected ?string $paid_start_date,
        protected ?string $paid_end_date,
        protected ?string $fulfillment_start_date,
        protected ?string $fulfillment_end_date,
        protected ?string $last_modified_date,
    ) {
    }

    /**
     * Define the HTTP method
     */
    protected Method $method = Method::GET;

    /**
     * Define the endpoint for the request
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
