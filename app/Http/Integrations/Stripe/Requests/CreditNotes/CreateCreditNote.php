<?php

namespace App\Http\Integrations\Stripe\Requests\CreditNotes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a credit note
 */
class CreateCreditNote extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/credit_notes';
    }

    public function __construct()
    {
    }
}
