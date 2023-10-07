<?php

namespace App\Http\Integrations\PayPal\Requests\Payouts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create batch payout
 */
class CreateBatchPayout extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/payments/payouts';
    }

    public function __construct(
        protected mixed $senderBatchHeader = null,
        protected mixed $items = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['sender_batch_header' => $this->senderBatchHeader, 'items' => $this->items]);
    }
}
