<?php

namespace App\Http\Integrations\Stripe\Requests\ApplicationFees;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update an application fee refund
 */
class UpdateApplicationFeeRefund extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/application_fees/{$this->fee}/refunds/{$this->id}";
    }

    public function __construct(
        protected string $fee,
        protected string $id,
    ) {
    }
}
