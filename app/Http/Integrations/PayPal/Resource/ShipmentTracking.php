<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\ShipmentTracking\AddTrackingInformationForMultiplePayPalTransactions;
use App\Http\Integrations\PayPal\Requests\ShipmentTracking\ShowTrackingInformation;
use App\Http\Integrations\PayPal\Requests\ShipmentTracking\UpdateOrCancelTrackingInformationForPayPalTransaction;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class ShipmentTracking extends Resource
{
    public function addTrackingInformationForMultiplePayPalTransactions(mixed $trackers): Response
    {
        return $this->connector->send(new AddTrackingInformationForMultiplePayPalTransactions($trackers));
    }

    public function showTrackingInformation(string $trackingId): Response
    {
        return $this->connector->send(new ShowTrackingInformation($trackingId));
    }

    public function updateOrCancelTrackingInformationForPayPalTransaction(
        string $trackingId,
        mixed $transactionId,
        mixed $trackingNumber,
        mixed $status,
        mixed $carrier,
        mixed $carrierNameOther,
    ): Response {
        return $this->connector->send(new UpdateOrCancelTrackingInformationForPayPalTransaction($trackingId, $transactionId, $trackingNumber, $status, $carrier, $carrierNameOther));
    }
}
