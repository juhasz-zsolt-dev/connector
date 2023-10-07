<?php

namespace App\Http\Integrations\Stripe\Requests\Invoices;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all invoices
 */
class ListAllInvoices extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/invoices';
    }

    /**
     * @param  null|string  $collectionMethod The collection method of the invoice to retrieve. Either `charge_automatically` or `send_invoice`.
     * @param  null|string  $customer Only return invoices for the customer specified by this customer ID.
     * @param  null|string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  null|string  $status The status of the invoice, one of `draft`, `open`, `paid`, `uncollectible`, or `void`. [Learn more](https://stripe.com/docs/billing/invoices/workflow#workflow-overview)
     * @param  null|string  $subscription Only return invoices for the subscription specified by this subscription ID.
     */
    public function __construct(
        protected ?string $collectionMethod = null,
        protected ?string $createdgt = null,
        protected ?string $createdgte = null,
        protected ?string $createdlt = null,
        protected ?string $createdlte = null,
        protected ?string $customer = null,
        protected ?string $dueDategt = null,
        protected ?string $dueDategte = null,
        protected ?string $dueDatelt = null,
        protected ?string $dueDatelte = null,
        protected ?string $endingBefore = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $limit = null,
        protected ?string $startingAfter = null,
        protected ?string $status = null,
        protected ?string $subscription = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'collection_method' => $this->collectionMethod,
            'created[gt]' => $this->createdgt,
            'created[gte]' => $this->createdgte,
            'created[lt]' => $this->createdlt,
            'created[lte]' => $this->createdlte,
            'customer' => $this->customer,
            'due_date[gt]' => $this->dueDategt,
            'due_date[gte]' => $this->dueDategte,
            'due_date[lt]' => $this->dueDatelt,
            'due_date[lte]' => $this->dueDatelte,
            'ending_before' => $this->endingBefore,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'limit' => $this->limit,
            'starting_after' => $this->startingAfter,
            'status' => $this->status,
            'subscription' => $this->subscription,
        ]);
    }
}
