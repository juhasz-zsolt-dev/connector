<?php

namespace App\Http\Integrations\Stripe\Requests\CreditNotes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a credit note
 */
class UpdateCreditNote extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/credit_notes/{$this->id}";
    }

    public function __construct(
        protected string $id,
    ) {
    }
}
