<?php

namespace App\Http\Integrations\PayPal\Requests\ShipmentTracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show tracking information
 */
class ShowTrackingInformation extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/shipping/trackers/{$this->trackingId}";
    }

    public function __construct(
        protected string $trackingId,
    ) {
    }
}
