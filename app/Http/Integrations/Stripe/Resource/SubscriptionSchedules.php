<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\SubscriptionSchedules\CancelSchedule;
use App\Http\Integrations\Stripe\Requests\SubscriptionSchedules\CreateSchedule;
use App\Http\Integrations\Stripe\Requests\SubscriptionSchedules\ListAllSchedules;
use App\Http\Integrations\Stripe\Requests\SubscriptionSchedules\ReleaseSchedule;
use App\Http\Integrations\Stripe\Requests\SubscriptionSchedules\RetrieveSchedule;
use App\Http\Integrations\Stripe\Requests\SubscriptionSchedules\UpdateSchedule;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class SubscriptionSchedules extends Resource
{
	/**
	 * @param string $canceledAtgt Only return subscription schedules that were created canceled the given date interval.
	 * @param string $canceledAtgte Only return subscription schedules that were created canceled the given date interval.
	 * @param string $canceledAtlt Only return subscription schedules that were created canceled the given date interval.
	 * @param string $canceledAtlte Only return subscription schedules that were created canceled the given date interval.
	 * @param string $completedAtgt Only return subscription schedules that completed during the given date interval.
	 * @param string $completedAtgte Only return subscription schedules that completed during the given date interval.
	 * @param string $completedAtlt Only return subscription schedules that completed during the given date interval.
	 * @param string $completedAtlte Only return subscription schedules that completed during the given date interval.
	 * @param string $createdgt Only return subscription schedules that were created during the given date interval.
	 * @param string $createdgte Only return subscription schedules that were created during the given date interval.
	 * @param string $createdlt Only return subscription schedules that were created during the given date interval.
	 * @param string $createdlte Only return subscription schedules that were created during the given date interval.
	 * @param string $customer Only return subscription schedules for the given customer.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $releasedAtgt Only return subscription schedules that were released during the given date interval.
	 * @param string $releasedAtgte Only return subscription schedules that were released during the given date interval.
	 * @param string $releasedAtlt Only return subscription schedules that were released during the given date interval.
	 * @param string $releasedAtlte Only return subscription schedules that were released during the given date interval.
	 * @param string $scheduled Only return subscription schedules that have not started yet.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllSchedules(
		?string $canceledAtgt,
		?string $canceledAtgte,
		?string $canceledAtlt,
		?string $canceledAtlte,
		?string $completedAtgt,
		?string $completedAtgte,
		?string $completedAtlt,
		?string $completedAtlte,
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $customer,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $releasedAtgt,
		?string $releasedAtgte,
		?string $releasedAtlt,
		?string $releasedAtlte,
		?string $scheduled,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllSchedules($canceledAtgt, $canceledAtgte, $canceledAtlt, $canceledAtlte, $completedAtgt, $completedAtgte, $completedAtlt, $completedAtlte, $createdgt, $createdgte, $createdlt, $createdlte, $customer, $endingBefore, $expand0, $expand1, $limit, $releasedAtgt, $releasedAtgte, $releasedAtlt, $releasedAtlte, $scheduled, $startingAfter));
	}


	public function createSchedule(): Response
	{
		return $this->connector->send(new CreateSchedule());
	}


	/**
	 * @param string $schedule
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveSchedule(string $schedule, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveSchedule($schedule, $expand0, $expand1));
	}


	/**
	 * @param string $schedule
	 */
	public function updateSchedule(string $schedule): Response
	{
		return $this->connector->send(new UpdateSchedule($schedule));
	}


	/**
	 * @param string $schedule
	 */
	public function cancelSchedule(string $schedule): Response
	{
		return $this->connector->send(new CancelSchedule($schedule));
	}


	/**
	 * @param string $schedule
	 */
	public function releaseSchedule(string $schedule): Response
	{
		return $this->connector->send(new ReleaseSchedule($schedule));
	}
}
