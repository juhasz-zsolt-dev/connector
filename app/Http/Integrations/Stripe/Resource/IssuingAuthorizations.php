<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\IssuingAuthorizations\ApproveAuthorization;
use App\Http\Integrations\Stripe\Requests\IssuingAuthorizations\DeclineAuthorization;
use App\Http\Integrations\Stripe\Requests\IssuingAuthorizations\ListAllAuthorizations;
use App\Http\Integrations\Stripe\Requests\IssuingAuthorizations\RetrieveAuthorization;
use App\Http\Integrations\Stripe\Requests\IssuingAuthorizations\UpdateAuthorization;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class IssuingAuthorizations extends Resource
{
	/**
	 * @param string $card Only return authorizations that belong to the given card.
	 * @param string $cardholder Only return authorizations that belong to the given cardholder.
	 * @param string $createdgt Only return authorizations that were created during the given date interval.
	 * @param string $createdgte Only return authorizations that were created during the given date interval.
	 * @param string $createdlt Only return authorizations that were created during the given date interval.
	 * @param string $createdlte Only return authorizations that were created during the given date interval.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $status Only return authorizations with the given status. One of `pending`, `closed`, or `reversed`.
	 */
	public function listAllAuthorizations(
		?string $card,
		?string $cardholder,
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
		return $this->connector->send(new ListAllAuthorizations($card, $cardholder, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $status));
	}


	/**
	 * @param string $authorization
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveAuthorization(string $authorization, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveAuthorization($authorization, $expand0, $expand1));
	}


	/**
	 * @param string $authorization
	 */
	public function updateAuthorization(string $authorization): Response
	{
		return $this->connector->send(new UpdateAuthorization($authorization));
	}


	/**
	 * @param string $authorization
	 */
	public function approveAuthorization(string $authorization): Response
	{
		return $this->connector->send(new ApproveAuthorization($authorization));
	}


	/**
	 * @param string $authorization
	 */
	public function declineAuthorization(string $authorization): Response
	{
		return $this->connector->send(new DeclineAuthorization($authorization));
	}
}
