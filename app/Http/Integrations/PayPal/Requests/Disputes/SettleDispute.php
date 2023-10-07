<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Settle dispute
 */
class SettleDispute extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/customer/disputes/{$this->disputeId}/adjudicate";
    }

    public function __construct(
        protected string $disputeId,
        protected mixed $adjudicationOutcome = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['adjudication_outcome' => $this->adjudicationOutcome]);
    }
}
