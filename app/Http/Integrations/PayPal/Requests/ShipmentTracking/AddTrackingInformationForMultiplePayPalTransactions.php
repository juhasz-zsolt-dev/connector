<?php

namespace App\Http\Integrations\PayPal\Requests\ShipmentTracking;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Add tracking information for multiple PayPal transactions
 */
class AddTrackingInformationForMultiplePayPalTransactions extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/shipping/trackers-batch';
    }

    public function __construct(
        protected mixed $trackers = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['trackers' => $this->trackers]);
    }
}
