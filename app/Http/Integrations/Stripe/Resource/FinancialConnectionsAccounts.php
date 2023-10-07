<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\FinancialConnectionsAccounts\DisconnectAccount;
use App\Http\Integrations\Stripe\Requests\FinancialConnectionsAccounts\ListAccounts;
use App\Http\Integrations\Stripe\Requests\FinancialConnectionsAccounts\RefreshAccountData;
use App\Http\Integrations\Stripe\Requests\FinancialConnectionsAccounts\RetrieveAccount;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class FinancialConnectionsAccounts extends Resource
{
	/**
	 * @param string $accountHolderaccount If present, only return accounts that belong to the specified account holder. `account_holder[customer]` and `account_holder[account]` are mutually exclusive.
	 * @param string $accountHoldercustomer If present, only return accounts that belong to the specified account holder. `account_holder[customer]` and `account_holder[account]` are mutually exclusive.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $session If present, only return accounts that were collected as part of the given session.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAccounts(
		?string $accountHolderaccount,
		?string $accountHoldercustomer,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $session,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAccounts($accountHolderaccount, $accountHoldercustomer, $endingBefore, $expand0, $expand1, $limit, $session, $startingAfter));
	}


	/**
	 * @param string $account
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveAccount(string $account, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveAccount($account, $expand0, $expand1));
	}


	/**
	 * @param string $account
	 */
	public function disconnectAccount(string $account): Response
	{
		return $this->connector->send(new DisconnectAccount($account));
	}


	/**
	 * @param string $account
	 */
	public function refreshAccountData(string $account): Response
	{
		return $this->connector->send(new RefreshAccountData($account));
	}
}
