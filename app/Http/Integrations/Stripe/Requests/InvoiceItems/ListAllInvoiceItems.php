<?php

namespace App\Http\Integrations\Stripe\Requests\InvoiceItems;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all invoice items
 */
class ListAllInvoiceItems extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/invoiceitems";
	}


	/**
	 * @param null|string $createdgt
	 * @param null|string $createdgte
	 * @param null|string $createdlt
	 * @param null|string $createdlte
	 * @param null|string $customer The identifier of the customer whose invoice items to return. If none is provided, all invoice items will be returned.
	 * @param null|string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $invoice Only return invoice items belonging to this invoice. If none is provided, all invoice items will be returned. If specifying an invoice, no customer identifier is needed.
	 * @param null|string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param null|string $pending Set to `true` to only show pending invoice items, which are not yet attached to any invoices. Set to `false` to only show invoice items already attached to invoices. If unspecified, no filter is applied.
	 * @param null|string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function __construct(
		protected ?string $createdgt = null,
		protected ?string $createdgte = null,
		protected ?string $createdlt = null,
		protected ?string $createdlte = null,
		protected ?string $customer = null,
		protected ?string $endingBefore = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $invoice = null,
		protected ?string $limit = null,
		protected ?string $pending = null,
		protected ?string $startingAfter = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'created[gt]' => $this->createdgt,
			'created[gte]' => $this->createdgte,
			'created[lt]' => $this->createdlt,
			'created[lte]' => $this->createdlte,
			'customer' => $this->customer,
			'ending_before' => $this->endingBefore,
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'invoice' => $this->invoice,
			'limit' => $this->limit,
			'pending' => $this->pending,
			'starting_after' => $this->startingAfter,
		]);
	}
}
