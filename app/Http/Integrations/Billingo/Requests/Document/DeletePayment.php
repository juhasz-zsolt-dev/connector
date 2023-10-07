<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePayment
 *
 * Delete all exist payment history on document.
 */
class DeletePayment extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/payments";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
