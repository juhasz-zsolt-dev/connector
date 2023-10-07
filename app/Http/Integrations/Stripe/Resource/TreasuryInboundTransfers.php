<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryInboundTransfers\CancelInboundTransfers;
use App\Http\Integrations\Stripe\Requests\TreasuryInboundTransfers\CreateInboundTransfer;
use App\Http\Integrations\Stripe\Requests\TreasuryInboundTransfers\ListAllInboundTransfers;
use App\Http\Integrations\Stripe\Requests\TreasuryInboundTransfers\RetrieveInboundTransfer;
use App\Http\Integrations\Stripe\Requests\TreasuryInboundTransfers\TestModeFailInboundTransfer;
use App\Http\Integrations\Stripe\Requests\TreasuryInboundTransfers\TestModeSucceedInboundTransfer;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryInboundTransfers extends Resource
{
	/**
	 * @param string $id
	 */
	public function testModeFailInboundTransfer(string $id): Response
	{
		return $this->connector->send(new TestModeFailInboundTransfer($id));
	}


	/**
	 * @param string $id
	 */
	public function testModeSucceedInboundTransfer(string $id): Response
	{
		return $this->connector->send(new TestModeSucceedInboundTransfer($id));
	}


	/**
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $financialAccount (Required) Returns objects associated with this FinancialAccount.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $status Only return InboundTransfers that have the given status: `processing`, `succeeded`, `failed` or `canceled`.
	 */
	public function listAllInboundTransfers(
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $financialAccount,
		?string $limit,
		?string $startingAfter,
		?string $status,
	): Response
	{
		return $this->connector->send(new ListAllInboundTransfers($endingBefore, $expand0, $expand1, $financialAccount, $limit, $startingAfter, $status));
	}


	public function createInboundTransfer(): Response
	{
		return $this->connector->send(new CreateInboundTransfer());
	}


	/**
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveInboundTransfer(string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveInboundTransfer($id, $expand0, $expand1));
	}


	/**
	 * @param string $inboundTransfer
	 */
	public function cancelInboundTransfers(string $inboundTransfer): Response
	{
		return $this->connector->send(new CancelInboundTransfers($inboundTransfer));
	}
}
