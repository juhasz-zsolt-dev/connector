<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create draft invoice
 */
class CreateDraftInvoice extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/invoicing/invoices";
	}


	/**
	 * @param null|mixed $detail
	 * @param null|mixed $invoicer
	 * @param null|mixed $primaryRecipients
	 * @param null|mixed $items
	 * @param null|mixed $configuration
	 * @param null|mixed $amount
	 */
	public function __construct(
		protected mixed $detail = null,
		protected mixed $invoicer = null,
		protected mixed $primaryRecipients = null,
		protected mixed $items = null,
		protected mixed $configuration = null,
		protected mixed $amount = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'detail' => $this->detail,
			'invoicer' => $this->invoicer,
			'primary_recipients' => $this->primaryRecipients,
			'items' => $this->items,
			'configuration' => $this->configuration,
			'amount' => $this->amount,
		]);
	}
}
