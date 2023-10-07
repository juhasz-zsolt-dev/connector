<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\RadarFraudEarlyWarnings\ListAllEarlyFraudWarnings;
use App\Http\Integrations\Stripe\Requests\RadarFraudEarlyWarnings\RetrieveEarlyFraudWarning;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class RadarFraudEarlyWarnings extends Resource
{
	/**
	 * @param string $charge Only return early fraud warnings for the charge specified by this charge ID.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $paymentIntent Only return early fraud warnings for charges that were created by the PaymentIntent specified by this PaymentIntent ID.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllEarlyFraudWarnings(
		?string $charge,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $paymentIntent,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllEarlyFraudWarnings($charge, $endingBefore, $expand0, $expand1, $limit, $paymentIntent, $startingAfter));
	}


	/**
	 * @param string $earlyFraudWarning
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveEarlyFraudWarning(string $earlyFraudWarning, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveEarlyFraudWarning($earlyFraudWarning, $expand0, $expand1));
	}
}
