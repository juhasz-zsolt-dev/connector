<?php

namespace App\Http\Integrations\PayPal\Requests\Payouts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Cancel unclaimed payout item
 */
class CancelUnclaimedPayoutItem extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/payments/payouts-item/{$this->payoutItemId}/cancel";
    }

    public function __construct(
        protected string $payoutItemId,
    ) {
    }
}
