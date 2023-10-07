<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\ApplicationFees\ListAllApplicationFees;
use App\Http\Integrations\Stripe\Requests\ApplicationFees\RetrieveApplicationFee;
use App\Http\Integrations\Stripe\Requests\ApplicationFees\RetrieveApplicationFeeRefund;
use App\Http\Integrations\Stripe\Requests\ApplicationFees\UpdateApplicationFeeRefund;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class ApplicationFees extends Resource
{
	/**
	 * @param string $charge Only return application fees for the charge specified by this charge ID.
	 * @param string $createdgt
	 * @param string $createdgte
	 * @param string $createdlt
	 * @param string $createdlte
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllApplicationFees(
		?string $charge,
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllApplicationFees($charge, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	/**
	 * @param string $fee
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveApplicationFeeRefund(string $fee, string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveApplicationFeeRefund($fee, $id, $expand0, $expand1));
	}


	/**
	 * @param string $fee
	 * @param string $id
	 */
	public function updateApplicationFeeRefund(string $fee, string $id): Response
	{
		return $this->connector->send(new UpdateApplicationFeeRefund($fee, $id));
	}


	/**
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveApplicationFee(string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveApplicationFee($id, $expand0, $expand1));
	}
}
