<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\BalanceTransactions\ListAllBalanceTransactions;
use App\Http\Integrations\Stripe\Requests\BalanceTransactions\RetrieveBalanceTransaction;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class BalanceTransactions extends Resource
{
	/**
	 * @param string $createdgt
	 * @param string $createdgte
	 * @param string $createdlt
	 * @param string $createdlte
	 * @param string $currency Only return transactions in a certain currency. Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $payout For automatic Stripe payouts only, only returns transactions that were paid out on the specified payout ID.
	 * @param string $source Only returns the original transaction.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $type Only returns transactions of the given type. One of: `adjustment`, `advance`, `advance_funding`, `anticipation_repayment`, `application_fee`, `application_fee_refund`, `charge`, `connect_collection_transfer`, `contribution`, `issuing_authorization_hold`, `issuing_authorization_release`, `issuing_dispute`, `issuing_transaction`, `payment`, `payment_failure_refund`, `payment_refund`, `payout`, `payout_cancel`, `payout_failure`, `refund`, `refund_failure`, `reserve_transaction`, `reserved_funds`, `stripe_fee`, `stripe_fx_fee`, `tax_fee`, `topup`, `topup_reversal`, `transfer`, `transfer_cancel`, `transfer_failure`, or `transfer_refund`.
	 */
	public function listAllBalanceTransactions(
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $currency,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $payout,
		?string $source,
		?string $startingAfter,
		?string $type,
	): Response
	{
		return $this->connector->send(new ListAllBalanceTransactions($createdgt, $createdgte, $createdlt, $createdlte, $currency, $endingBefore, $expand0, $expand1, $limit, $payout, $source, $startingAfter, $type));
	}


	/**
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveBalanceTransaction(string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveBalanceTransaction($id, $expand0, $expand1));
	}
}
