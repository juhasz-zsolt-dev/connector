<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CreateReceiptFromDraft
 *
 * Converts a draft to a receipt. Returns the receipt object if the convert is succeded.
 */
class CreateReceiptFromDraft extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/documents/receipt/{$this->id}";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
