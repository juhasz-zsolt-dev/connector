<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Deny offer to resolve dispute
 */
class DenyOfferToResolveDispute extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/customer/disputes/{$this->disputeId}/deny-offer";
    }

    public function __construct(
        protected string $disputeId,
        protected mixed $note = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['note' => $this->note]);
    }
}
