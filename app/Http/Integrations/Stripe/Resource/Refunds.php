<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Refunds\CreateRefund;
use App\Http\Integrations\Stripe\Requests\Refunds\ListAllRefunds;
use App\Http\Integrations\Stripe\Requests\Refunds\RetrieveRefund;
use App\Http\Integrations\Stripe\Requests\Refunds\UpdateRefund;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Refunds extends Resource
{
	/**
	 * @param string $charge Only return refunds for the charge specified by this charge ID.
	 * @param string $createdgt
	 * @param string $createdgte
	 * @param string $createdlt
	 * @param string $createdlte
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $paymentIntent Only return refunds for the PaymentIntent specified by this ID.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllRefunds(
		?string $charge,
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $paymentIntent,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllRefunds($charge, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $paymentIntent, $startingAfter));
	}


	public function createRefund(): Response
	{
		return $this->connector->send(new CreateRefund());
	}


	/**
	 * @param string $refund
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveRefund(string $refund, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveRefund($refund, $expand0, $expand1));
	}


	/**
	 * @param string $refund
	 */
	public function updateRefund(string $refund): Response
	{
		return $this->connector->send(new UpdateRefund($refund));
	}
}
