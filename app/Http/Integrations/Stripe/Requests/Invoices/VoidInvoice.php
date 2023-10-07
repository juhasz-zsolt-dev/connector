<?php

namespace App\Http\Integrations\Stripe\Requests\Invoices;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Void an invoice
 */
class VoidInvoice extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/invoices/{$this->invoice}/void";
	}


	/**
	 * @param string $invoice
	 */
	public function __construct(
		protected string $invoice,
	) {
	}
}
