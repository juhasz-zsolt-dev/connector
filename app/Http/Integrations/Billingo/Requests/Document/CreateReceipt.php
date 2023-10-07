<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * CreateReceipt
 *
 * Create a new receipt. Returns a document object if the create is succeded.
 */
class CreateReceipt extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/documents/receipt';
    }

    public function __construct()
    {
    }
}
