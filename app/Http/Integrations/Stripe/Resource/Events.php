<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Events\ListAllEvents;
use App\Http\Integrations\Stripe\Requests\Events\RetrieveEvent;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Events extends Resource
{
	/**
	 * @param string $createdgt
	 * @param string $createdgte
	 * @param string $createdlt
	 * @param string $createdlte
	 * @param string $deliverySuccess Filter events by whether all webhooks were successfully delivered. If false, events which are still pending or have failed all delivery attempts to a webhook endpoint will be returned.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $type A string containing a specific event name, or group of events using * as a wildcard. The list will be filtered to include only events with a matching event property.
	 * @param string $types0 An array of up to 20 strings containing specific event names. The list will be filtered to include only events with a matching event property. You may pass either `type` or `types`, but not both.
	 * @param string $types1 An array of up to 20 strings containing specific event names. The list will be filtered to include only events with a matching event property. You may pass either `type` or `types`, but not both.
	 */
	public function listAllEvents(
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $deliverySuccess,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
		?string $type,
		?string $types0,
		?string $types1,
	): Response
	{
		return $this->connector->send(new ListAllEvents($createdgt, $createdgte, $createdlt, $createdlte, $deliverySuccess, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $type, $types0, $types1));
	}


	/**
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveEvent(string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveEvent($id, $expand0, $expand1));
	}
}
