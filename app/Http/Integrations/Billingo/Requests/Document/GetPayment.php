<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPayment
 *
 * Retrieves the details of payment history an existing document.
 */
class GetPayment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/payments";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
