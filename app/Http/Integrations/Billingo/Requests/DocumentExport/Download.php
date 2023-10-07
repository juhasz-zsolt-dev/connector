<?php

namespace App\Http\Integrations\Billingo\Requests\DocumentExport;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Download
 *
 * Return the exported file.
 */
class Download extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/document-export/{$this->id}/download";
    }

    /**
     * @param  string  $id The ID from create document export endpoint.
     */
    public function __construct(
        protected string $id,
    ) {
    }
}
