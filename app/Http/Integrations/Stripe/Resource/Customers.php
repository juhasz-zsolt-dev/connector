<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Customers\CreateCustomer;
use App\Http\Integrations\Stripe\Requests\Customers\DeleteCustomer;
use App\Http\Integrations\Stripe\Requests\Customers\ListAllCustomers;
use App\Http\Integrations\Stripe\Requests\Customers\RetrieveCustomer;
use App\Http\Integrations\Stripe\Requests\Customers\RetrieveCustomerPaymentMethod;
use App\Http\Integrations\Stripe\Requests\Customers\SearchCustomers;
use App\Http\Integrations\Stripe\Requests\Customers\UpdateCustomer;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Customers extends Resource
{
	/**
	 * @param string $createdgt
	 * @param string $createdgte
	 * @param string $createdlt
	 * @param string $createdlte
	 * @param string $email A case-sensitive filter on the list based on the customer's `email` field. The value must be a string.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $testClock Provides a list of customers that are associated with the specified test clock. The response will not include customers with test clocks if this parameter is not set.
	 */
	public function listAllCustomers(
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $email,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
		?string $testClock,
	): Response
	{
		return $this->connector->send(new ListAllCustomers($createdgt, $createdgte, $createdlt, $createdlte, $email, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $testClock));
	}


	public function createCustomer(): Response
	{
		return $this->connector->send(new CreateCustomer());
	}


	/**
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $page A cursor for pagination across multiple pages of results. Don't include this parameter on the first call. Use the next_page value returned in a previous response to request subsequent results.
	 * @param string $query (Required) The search query string. See [search query language](https://stripe.com/docs/search#search-query-language) and the list of supported [query fields for customers](https://stripe.com/docs/search#query-fields-for-customers).
	 */
	public function searchCustomers(
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $page,
		?string $query,
	): Response
	{
		return $this->connector->send(new SearchCustomers($expand0, $expand1, $limit, $page, $query));
	}


	/**
	 * @param string $customer
	 */
	public function deleteCustomer(string $customer): Response
	{
		return $this->connector->send(new DeleteCustomer($customer));
	}


	/**
	 * @param string $customer
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveCustomer(string $customer, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveCustomer($customer, $expand0, $expand1));
	}


	/**
	 * @param string $customer
	 */
	public function updateCustomer(string $customer): Response
	{
		return $this->connector->send(new UpdateCustomer($customer));
	}


	/**
	 * @param string $customer
	 * @param string $paymentMethod
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveCustomerPaymentMethod(
		string $customer,
		string $paymentMethod,
		?string $expand0,
		?string $expand1,
	): Response
	{
		return $this->connector->send(new RetrieveCustomerPaymentMethod($customer, $paymentMethod, $expand0, $expand1));
	}
}
