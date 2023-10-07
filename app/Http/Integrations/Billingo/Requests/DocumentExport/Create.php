<?php

namespace App\Http\Integrations\Billingo\Requests\DocumentExport;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create
 *
 * Return with the id of the export.
 */
class Create extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/document-export';
    }

    public function __construct()
    {
    }
}
