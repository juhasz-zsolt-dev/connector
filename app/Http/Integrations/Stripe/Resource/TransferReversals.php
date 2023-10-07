<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TransferReversals\CreateTransferReversal;
use App\Http\Integrations\Stripe\Requests\TransferReversals\ListAllTransferReversals;
use App\Http\Integrations\Stripe\Requests\TransferReversals\RetrieveTransferReversal;
use App\Http\Integrations\Stripe\Requests\TransferReversals\UpdateTransferReversal;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TransferReversals extends Resource
{
	/**
	 * @param string $id
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllTransferReversals(
		string $id,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllTransferReversals($id, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	/**
	 * @param string $id
	 */
	public function createTransferReversal(string $id): Response
	{
		return $this->connector->send(new CreateTransferReversal($id));
	}


	/**
	 * @param string $transfer
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveTransferReversal(string $transfer, string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveTransferReversal($transfer, $id, $expand0, $expand1));
	}


	/**
	 * @param string $transfer
	 * @param string $id
	 */
	public function updateTransferReversal(string $transfer, string $id): Response
	{
		return $this->connector->send(new UpdateTransferReversal($transfer, $id));
	}
}
