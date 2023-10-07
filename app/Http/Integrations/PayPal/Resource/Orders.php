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
	/**
	 * @param mixed $intent
	 * @param mixed $purchaseUnits
	 * @param mixed $applicationContext
	 */
	public function createOrder(mixed $intent, mixed $purchaseUnits, mixed $applicationContext): Response
	{
		return $this->connector->send(new CreateOrder($intent, $purchaseUnits, $applicationContext));
	}


	/**
	 * @param string $orderId
	 */
	public function showOrderDetails(string $orderId): Response
	{
		return $this->connector->send(new ShowOrderDetails($orderId));
	}


	/**
	 * @param string $orderId
	 * @param array $values
	 */
	public function updateOrder(string $orderId, ?array $values): Response
	{
		return $this->connector->send(new UpdateOrder($orderId, $values));
	}


	/**
	 * @param string $orderId
	 */
	public function authorizePaymentForOrder(string $orderId): Response
	{
		return $this->connector->send(new AuthorizePaymentForOrder($orderId));
	}


	/**
	 * @param string $orderId
	 */
	public function capturePaymentForOrder(string $orderId): Response
	{
		return $this->connector->send(new CapturePaymentForOrder($orderId));
	}
}
