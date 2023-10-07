<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TopUps\CancelTopUp;
use App\Http\Integrations\Stripe\Requests\TopUps\CreateTopUp;
use App\Http\Integrations\Stripe\Requests\TopUps\ListAllTopUps;
use App\Http\Integrations\Stripe\Requests\TopUps\RetrieveTopUp;
use App\Http\Integrations\Stripe\Requests\TopUps\UpdateTopUp;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TopUps extends Resource
{
	/**
	 * @param string $amountgt A positive integer representing how much to transfer.
	 * @param string $amountgte A positive integer representing how much to transfer.
	 * @param string $amountlt A positive integer representing how much to transfer.
	 * @param string $amountlte A positive integer representing how much to transfer.
	 * @param string $createdgt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
	 * @param string $createdgte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
	 * @param string $createdlt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
	 * @param string $createdlte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $status Only return top-ups that have the given status. One of `canceled`, `failed`, `pending` or `succeeded`.
	 */
	public function listAllTopUps(
		?string $amountgt,
		?string $amountgte,
		?string $amountlt,
		?string $amountlte,
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
		?string $status,
	): Response
	{
		return $this->connector->send(new ListAllTopUps($amountgt, $amountgte, $amountlt, $amountlte, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $status));
	}


	public function createTopUp(): Response
	{
		return $this->connector->send(new CreateTopUp());
	}


	/**
	 * @param string $topup
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveTopUp(string $topup, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveTopUp($topup, $expand0, $expand1));
	}


	/**
	 * @param string $topup
	 */
	public function updateTopUp(string $topup): Response
	{
		return $this->connector->send(new UpdateTopUp($topup));
	}


	/**
	 * @param string $topup
	 */
	public function cancelTopUp(string $topup): Response
	{
		return $this->connector->send(new CancelTopUp($topup));
	}
}
