<?php

namespace App\Http\Integrations\Billingo\Requests\DocumentExport;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Poll
 *
 * Return state of the given export.
 */
class Poll extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/document-export/{$this->id}/poll";
    }

    /**
     * @param  string  $id The ID from create document export endpoint.
     */
    public function __construct(
        protected string $id,
    ) {
    }
}
