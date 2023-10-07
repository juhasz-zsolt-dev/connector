<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\IssuingDisputes\CreateDispute;
use App\Http\Integrations\Stripe\Requests\IssuingDisputes\ListAllDisputes;
use App\Http\Integrations\Stripe\Requests\IssuingDisputes\RetrieveDispute;
use App\Http\Integrations\Stripe\Requests\IssuingDisputes\SubmitDispute;
use App\Http\Integrations\Stripe\Requests\IssuingDisputes\UpdateDispute;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class IssuingDisputes extends Resource
{
	/**
	 * @param string $createdgt Select Issuing disputes that were created during the given date interval.
	 * @param string $createdgte Select Issuing disputes that were created during the given date interval.
	 * @param string $createdlt Select Issuing disputes that were created during the given date interval.
	 * @param string $createdlte Select Issuing disputes that were created during the given date interval.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $status Select Issuing disputes with the given status.
	 * @param string $transaction Select the Issuing dispute for the given transaction.
	 */
	public function listAllDisputes(
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
		?string $transaction,
	): Response
	{
		return $this->connector->send(new ListAllDisputes($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $status, $transaction));
	}


	public function createDispute(): Response
	{
		return $this->connector->send(new CreateDispute());
	}


	/**
	 * @param string $dispute
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveDispute(string $dispute, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveDispute($dispute, $expand0, $expand1));
	}


	/**
	 * @param string $dispute
	 */
	public function updateDispute(string $dispute): Response
	{
		return $this->connector->send(new UpdateDispute($dispute));
	}


	/**
	 * @param string $dispute
	 */
	public function submitDispute(string $dispute): Response
	{
		return $this->connector->send(new SubmitDispute($dispute));
	}
}
