<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments\CancelOutboundPayment;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments\CreateOutboundPayment;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments\ListAllOutboundPayments;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments\RetrieveOutboundPayment;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments\TestModeFailOutboundPayment;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments\TestModePostOutboundPayment;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundPayments\TestModeReturnOutboundPayment;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryOutboundPayments extends Resource
{
	/**
	 * @param string $id
	 */
	public function testModeFailOutboundPayment(string $id): Response
	{
		return $this->connector->send(new TestModeFailOutboundPayment($id));
	}


	/**
	 * @param string $id
	 */
	public function testModePostOutboundPayment(string $id): Response
	{
		return $this->connector->send(new TestModePostOutboundPayment($id));
	}


	/**
	 * @param string $id
	 */
	public function testModeReturnOutboundPayment(string $id): Response
	{
		return $this->connector->send(new TestModeReturnOutboundPayment($id));
	}


	/**
	 * @param string $customer Only return OutboundPayments sent to this customer.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $financialAccount (Required) Returns objects associated with this FinancialAccount.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $status Only return OutboundPayments that have the given status: `processing`, `failed`, `posted`, `returned`, or `canceled`.
	 */
	public function listAllOutboundPayments(
		?string $customer,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $financialAccount,
		?string $limit,
		?string $startingAfter,
		?string $status,
	): Response
	{
		return $this->connector->send(new ListAllOutboundPayments($customer, $endingBefore, $expand0, $expand1, $financialAccount, $limit, $startingAfter, $status));
	}


	public function createOutboundPayment(): Response
	{
		return $this->connector->send(new CreateOutboundPayment());
	}


	/**
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveOutboundPayment(string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveOutboundPayment($id, $expand0, $expand1));
	}


	/**
	 * @param string $id
	 */
	public function cancelOutboundPayment(string $id): Response
	{
		return $this->connector->send(new CancelOutboundPayment($id));
	}
}
