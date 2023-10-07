<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\PaymentLinks\CreatePaymentLink;
use App\Http\Integrations\Stripe\Requests\PaymentLinks\ListAllPaymentLinks;
use App\Http\Integrations\Stripe\Requests\PaymentLinks\RetrievePaymentLink;
use App\Http\Integrations\Stripe\Requests\PaymentLinks\RetrievePaymentLinkLineItems;
use App\Http\Integrations\Stripe\Requests\PaymentLinks\UpdatePaymentLink;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class PaymentLinks extends Resource
{
	/**
	 * @param string $active Only return payment links that are active or inactive (e.g., pass `false` to list all inactive payment links).
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllPaymentLinks(
		?string $active,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllPaymentLinks($active, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	public function createPaymentLink(): Response
	{
		return $this->connector->send(new CreatePaymentLink());
	}


	/**
	 * @param string $paymentLink
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrievePaymentLink(string $paymentLink, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrievePaymentLink($paymentLink, $expand0, $expand1));
	}


	/**
	 * @param string $paymentLink
	 */
	public function updatePaymentLink(string $paymentLink): Response
	{
		return $this->connector->send(new UpdatePaymentLink($paymentLink));
	}


	/**
	 * @param string $paymentLink
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function retrievePaymentLinkLineItems(
		string $paymentLink,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new RetrievePaymentLinkLineItems($paymentLink, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}
}
