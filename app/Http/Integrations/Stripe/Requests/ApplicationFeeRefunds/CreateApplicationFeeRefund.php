<?php

namespace App\Http\Integrations\Stripe\Requests\ApplicationFeeRefunds;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create an application fee refund
 */
class CreateApplicationFeeRefund extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/application_fees/{$this->id}/refund";
    }

    public function __construct(
        protected string $id,
    ) {
    }
}
