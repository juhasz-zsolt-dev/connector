<?php

namespace App\Http\Integrations\PayPal\Requests\Invoices;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Search for invoices
 */
class SearchForInvoices extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/invoicing/search-invoices";
	}


	/**
	 * @param null|mixed $recipientEmail
	 * @param null|mixed $recipientFirstName
	 * @param null|mixed $recipientLastName
	 * @param null|mixed $recipientBusinessName
	 * @param null|mixed $invoiceNumber
	 * @param null|mixed $status
	 * @param null|mixed $reference
	 * @param null|mixed $currencyCode
	 * @param null|mixed $memo
	 * @param null|mixed $totalAmountRange
	 * @param null|mixed $invoiceDateRange
	 * @param null|string $page The page number to be retrieved, for the list of items. So, a combination of `page=1` and `page_size=20` returns the first 20 invoices. A combination of `page=2` and `page_size=20` returns the next 20 invoices.
	 * @param null|string $pageSize The page size for the search results.
	 * @param null|string $totalRequired Indicates whether the to show <code>total_pages</code> and <code>total_items</code> in the response.
	 */
	public function __construct(
		protected mixed $recipientEmail = null,
		protected mixed $recipientFirstName = null,
		protected mixed $recipientLastName = null,
		protected mixed $recipientBusinessName = null,
		protected mixed $invoiceNumber = null,
		protected mixed $status = null,
		protected mixed $reference = null,
		protected mixed $currencyCode = null,
		protected mixed $memo = null,
		protected mixed $totalAmountRange = null,
		protected mixed $invoiceDateRange = null,
		protected ?string $page = null,
		protected ?string $pageSize = null,
		protected ?string $totalRequired = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'recipient_email' => $this->recipientEmail,
			'recipient_first_name' => $this->recipientFirstName,
			'recipient_last_name' => $this->recipientLastName,
			'recipient_business_name' => $this->recipientBusinessName,
			'invoice_number' => $this->invoiceNumber,
			'status' => $this->status,
			'reference' => $this->reference,
			'currency_code' => $this->currencyCode,
			'memo' => $this->memo,
			'total_amount_range' => $this->totalAmountRange,
			'invoice_date_range' => $this->invoiceDateRange,
		]);
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page, 'page_size' => $this->pageSize, 'total_required' => $this->totalRequired]);
	}
}
