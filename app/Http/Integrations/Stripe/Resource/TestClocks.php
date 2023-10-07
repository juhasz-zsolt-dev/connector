<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TestClocks\AdvanceTestClock;
use App\Http\Integrations\Stripe\Requests\TestClocks\CreateTestClock;
use App\Http\Integrations\Stripe\Requests\TestClocks\DeleteTestClock;
use App\Http\Integrations\Stripe\Requests\TestClocks\ListAllTestClocks;
use App\Http\Integrations\Stripe\Requests\TestClocks\RetrieveTestClock;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TestClocks extends Resource
{
	/**
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllTestClocks(
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllTestClocks($endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	public function createTestClock(): Response
	{
		return $this->connector->send(new CreateTestClock());
	}


	/**
	 * @param string $testClock
	 */
	public function deleteTestClock(string $testClock): Response
	{
		return $this->connector->send(new DeleteTestClock($testClock));
	}


	/**
	 * @param string $testClock
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveTestClock(string $testClock, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveTestClock($testClock, $expand0, $expand1));
	}


	/**
	 * @param string $testClock
	 */
	public function advanceTestClock(string $testClock): Response
	{
		return $this->connector->send(new AdvanceTestClock($testClock));
	}
}
