<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\CustomerCashBalanceTransactions\ListCashBalanceTransactions;
use App\Http\Integrations\Stripe\Requests\CustomerCashBalanceTransactions\RetrieveCashBalanceTransaction;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class CustomerCashBalanceTransactions extends Resource
{
	/**
	 * @param string $customer
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listCashBalanceTransactions(
		string $customer,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListCashBalanceTransactions($customer, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	/**
	 * @param string $customer
	 * @param string $transaction
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveCashBalanceTransaction(
		string $customer,
		string $transaction,
		?string $expand0,
		?string $expand1,
	): Response
	{
		return $this->connector->send(new RetrieveCashBalanceTransaction($customer, $transaction, $expand0, $expand1));
	}
}
