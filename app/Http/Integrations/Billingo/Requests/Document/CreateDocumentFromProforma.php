<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateDocumentFromProforma
 *
 * Create a new document from proforma. Returns a document object if the create is succeded.
 */
class CreateDocumentFromProforma extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/create-from-proforma";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
