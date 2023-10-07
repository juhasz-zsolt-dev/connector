<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdatePayment
 *
 * Update payment history an existing document. Returns a payment history object if the update is
 * succeded.
 */
class UpdatePayment extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/payments";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
