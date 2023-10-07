<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Acknowledge returned item
 */
class AcknowledgeReturnedItem extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/customer/disputes/{$this->disputeId}/acknowledge-return-item";
    }

    public function __construct(
        protected string $disputeId,
        protected mixed $note = null,
        protected mixed $acknowledgementType = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['note' => $this->note, 'acknowledgement_type' => $this->acknowledgementType]);
    }
}
