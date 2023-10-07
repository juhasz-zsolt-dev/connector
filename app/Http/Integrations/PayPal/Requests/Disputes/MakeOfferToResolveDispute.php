<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Make offer to resolve dispute
 */
class MakeOfferToResolveDispute extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/customer/disputes/{$this->disputeId}/make-offer";
    }

    public function __construct(
        protected string $disputeId,
        protected mixed $note = null,
        protected mixed $offerAmount = null,
        protected mixed $offerType = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['note' => $this->note, 'offer_amount' => $this->offerAmount, 'offer_type' => $this->offerType]);
    }
}
