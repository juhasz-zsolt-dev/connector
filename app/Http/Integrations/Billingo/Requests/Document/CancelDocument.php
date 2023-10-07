<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CancelDocument
 *
 * Cancel a document. Returns a cancellation document object if the cancellation is succeded.
 */
class CancelDocument extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/cancel";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
