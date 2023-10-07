<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetDocumentByVendorId
 *
 * Retrieves the details of an existing document by vendor id.
 */
class GetDocumentByVendorId extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/vendor/{$this->vendorId}";
    }

    public function __construct(
        protected string $vendorId,
    ) {
    }
}
