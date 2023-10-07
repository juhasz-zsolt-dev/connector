<?php

namespace App\Http\Integrations\PayPal\Requests\Payments;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Refund captured payment
 */
class RefundCapturedPayment extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/payments/captures/{$this->captureId}/refund";
	}


	/**
	 * @param string $captureId
	 * @param null|mixed $amount
	 * @param null|mixed $invoiceId
	 * @param null|mixed $noteToPayer
	 */
	public function __construct(
		protected string $captureId,
		protected mixed $amount = null,
		protected mixed $invoiceId = null,
		protected mixed $noteToPayer = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['amount' => $this->amount, 'invoice_id' => $this->invoiceId, 'note_to_payer' => $this->noteToPayer]);
	}
}
