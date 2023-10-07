<?php

namespace App\Http\Integrations\Stripe\Requests\Events;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all events
 */
class ListAllEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/events";
	}


	/**
	 * @param null|string $createdgt
	 * @param null|string $createdgte
	 * @param null|string $createdlt
	 * @param null|string $createdlte
	 * @param null|string $deliverySuccess Filter events by whether all webhooks were successfully delivered. If false, events which are still pending or have failed all delivery attempts to a webhook endpoint will be returned.
	 * @param null|string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param null|string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param null|string $type A string containing a specific event name, or group of events using * as a wildcard. The list will be filtered to include only events with a matching event property.
	 * @param null|string $types0 An array of up to 20 strings containing specific event names. The list will be filtered to include only events with a matching event property. You may pass either `type` or `types`, but not both.
	 * @param null|string $types1 An array of up to 20 strings containing specific event names. The list will be filtered to include only events with a matching event property. You may pass either `type` or `types`, but not both.
	 */
	public function __construct(
		protected ?string $createdgt = null,
		protected ?string $createdgte = null,
		protected ?string $createdlt = null,
		protected ?string $createdlte = null,
		protected ?string $deliverySuccess = null,
		protected ?string $endingBefore = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $limit = null,
		protected ?string $startingAfter = null,
		protected ?string $type = null,
		protected ?string $types0 = null,
		protected ?string $types1 = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'created[gt]' => $this->createdgt,
			'created[gte]' => $this->createdgte,
			'created[lt]' => $this->createdlt,
			'created[lte]' => $this->createdlte,
			'delivery_success' => $this->deliverySuccess,
			'ending_before' => $this->endingBefore,
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'limit' => $this->limit,
			'starting_after' => $this->startingAfter,
			'type' => $this->type,
			'types[0]' => $this->types0,
			'types[1]' => $this->types1,
		]);
	}
}
