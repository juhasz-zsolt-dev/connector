<?php

namespace App\Http\Integrations\PayPal\Requests\ShipmentTracking;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Update or cancel tracking information for PayPal transaction
 */
class UpdateOrCancelTrackingInformationForPayPalTransaction extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/v1/shipping/trackers/{$this->trackingId}";
	}


	/**
	 * @param string $trackingId
	 * @param null|mixed $transactionId
	 * @param null|mixed $trackingNumber
	 * @param null|mixed $status
	 * @param null|mixed $carrier
	 * @param null|mixed $carrierNameOther
	 */
	public function __construct(
		protected string $trackingId,
		protected mixed $transactionId = null,
		protected mixed $trackingNumber = null,
		protected mixed $status = null,
		protected mixed $carrier = null,
		protected mixed $carrierNameOther = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'transaction_id' => $this->transactionId,
			'tracking_number' => $this->trackingNumber,
			'status' => $this->status,
			'carrier' => $this->carrier,
			'carrier_name_other' => $this->carrierNameOther,
		]);
	}
}
