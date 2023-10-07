<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers\CancelOutboundTransfer;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers\CreateOutboundTransfer;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers\ListAllOutboundTransfers;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers\RetrieveOutboundTransfer;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers\TestModeFailOutboundTransfer;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers\TestModePostOutboundTransfer;
use App\Http\Integrations\Stripe\Requests\TreasuryOutboundTransfers\TestModeReturnOutboundTransfer;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryOutboundTransfers extends Resource
{
	/**
	 * @param string $outboundTransfer
	 */
	public function testModeFailOutboundTransfer(string $outboundTransfer): Response
	{
		return $this->connector->send(new TestModeFailOutboundTransfer($outboundTransfer));
	}


	/**
	 * @param string $outboundTransfer
	 */
	public function testModePostOutboundTransfer(string $outboundTransfer): Response
	{
		return $this->connector->send(new TestModePostOutboundTransfer($outboundTransfer));
	}


	/**
	 * @param string $outboundTransfer
	 */
	public function testModeReturnOutboundTransfer(string $outboundTransfer): Response
	{
		return $this->connector->send(new TestModeReturnOutboundTransfer($outboundTransfer));
	}


	/**
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $financialAccount (Required) Returns objects associated with this FinancialAccount.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $status Only return OutboundTransfers that have the given status: `processing`, `canceled`, `failed`, `posted`, or `returned`.
	 */
	public function listAllOutboundTransfers(
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $financialAccount,
		?string $limit,
		?string $startingAfter,
		?string $status,
	): Response
	{
		return $this->connector->send(new ListAllOutboundTransfers($endingBefore, $expand0, $expand1, $financialAccount, $limit, $startingAfter, $status));
	}


	public function createOutboundTransfer(): Response
	{
		return $this->connector->send(new CreateOutboundTransfer());
	}


	/**
	 * @param string $outboundTransfer
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveOutboundTransfer(string $outboundTransfer, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveOutboundTransfer($outboundTransfer, $expand0, $expand1));
	}


	/**
	 * @param string $outboundTransfer
	 */
	public function cancelOutboundTransfer(string $outboundTransfer): Response
	{
		return $this->connector->send(new CancelOutboundTransfer($outboundTransfer));
	}
}
