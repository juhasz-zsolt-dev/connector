<?php

namespace App\Http\Integrations\PayPal\Requests\Disputes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Partially update dispute
 */
class PartiallyUpdateDispute extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/v1/customer/disputes/{$this->disputeId}";
    }

    public function __construct(
        protected string $disputeId,
        protected ?array $values = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['values' => $this->values]);
    }
}
