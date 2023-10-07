<?php

namespace App\Http\Integrations\Stripe\Requests\TransferReversals;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a transfer reversal
 */
class UpdateTransferReversal extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/transfers/{$this->transfer}/reversals/{$this->id}";
    }

    public function __construct(
        protected string $transfer,
        protected string $id,
    ) {
    }
}
