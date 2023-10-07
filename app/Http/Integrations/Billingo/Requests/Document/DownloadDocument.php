<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DownloadDocument
 *
 * Download a document. Returns a document in PDF format.
 */
class DownloadDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/download";
    }

    public function __construct(
        protected int $id,
    ) {
    }
}
