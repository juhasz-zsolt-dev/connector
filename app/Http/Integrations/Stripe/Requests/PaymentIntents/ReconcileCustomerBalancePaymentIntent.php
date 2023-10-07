<?php

namespace App\Http\Integrations\Stripe\Requests\PaymentIntents;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Reconcile a customer_balance PaymentIntent
 */
class ReconcileCustomerBalancePaymentIntent extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/payment_intents/{$this->intent}/apply_customer_balance";
	}


	/**
	 * @param string $intent
	 */
	public function __construct(
		protected string $intent,
	) {
	}
}
