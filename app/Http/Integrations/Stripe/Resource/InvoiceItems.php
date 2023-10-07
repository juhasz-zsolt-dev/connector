<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\InvoiceItems\CreateInvoiceItem;
use App\Http\Integrations\Stripe\Requests\InvoiceItems\DeleteInvoiceItem;
use App\Http\Integrations\Stripe\Requests\InvoiceItems\ListAllInvoiceItems;
use App\Http\Integrations\Stripe\Requests\InvoiceItems\RetrieveInvoiceItem;
use App\Http\Integrations\Stripe\Requests\InvoiceItems\UpdateInvoiceItem;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class InvoiceItems extends Resource
{
    /**
     * @param  string  $customer The identifier of the customer whose invoice items to return. If none is provided, all invoice items will be returned.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $invoice Only return invoice items belonging to this invoice. If none is provided, all invoice items will be returned. If specifying an invoice, no customer identifier is needed.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $pending Set to `true` to only show pending invoice items, which are not yet attached to any invoices. Set to `false` to only show invoice items already attached to invoices. If unspecified, no filter is applied.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllInvoiceItems(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $invoice,
        ?string $limit,
        ?string $pending,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllInvoiceItems($createdgt, $createdgte, $createdlt, $createdlte, $customer, $endingBefore, $expand0, $expand1, $invoice, $limit, $pending, $startingAfter));
    }

    public function createInvoiceItem(): Response
    {
        return $this->connector->send(new CreateInvoiceItem());
    }

    public function deleteInvoiceItem(string $invoiceitem): Response
    {
        return $this->connector->send(new DeleteInvoiceItem($invoiceitem));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveInvoiceItem(string $invoiceitem, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveInvoiceItem($invoiceitem, $expand0, $expand1));
    }

    public function updateInvoiceItem(string $invoiceitem): Response
    {
        return $this->connector->send(new UpdateInvoiceItem($invoiceitem));
    }
}
