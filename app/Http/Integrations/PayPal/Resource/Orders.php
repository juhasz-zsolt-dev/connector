<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Orders\AuthorizePaymentForOrder;
use App\Http\Integrations\PayPal\Requests\Orders\CapturePaymentForOrder;
use App\Http\Integrations\PayPal\Requests\Orders\CreateOrder;
use App\Http\Integrations\PayPal\Requests\Orders\ShowOrderDetails;
use App\Http\Integrations\PayPal\Requests\Orders\UpdateOrder;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Orders extends Resource
{
    public function createOrder(mixed $intent, mixed $purchaseUnits, mixed $applicationContext): Response
    {
        return $this->connector->send(new CreateOrder($intent, $purchaseUnits, $applicationContext));
    }

    public function showOrderDetails(string $orderId): Response
    {
        return $this->connector->send(new ShowOrderDetails($orderId));
    }

    public function updateOrder(string $orderId, ?array $values): Response
    {
        return $this->connector->send(new UpdateOrder($orderId, $values));
    }

    public function authorizePaymentForOrder(string $orderId): Response
    {
        return $this->connector->send(new AuthorizePaymentForOrder($orderId));
    }

    public function capturePaymentForOrder(string $orderId): Response
    {
        return $this->connector->send(new CapturePaymentForOrder($orderId));
    }
}
