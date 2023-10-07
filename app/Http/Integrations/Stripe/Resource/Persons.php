<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Persons\CreatePerson;
use App\Http\Integrations\Stripe\Requests\Persons\DeletePerson;
use App\Http\Integrations\Stripe\Requests\Persons\ListAllPersons;
use App\Http\Integrations\Stripe\Requests\Persons\RetrievePerson;
use App\Http\Integrations\Stripe\Requests\Persons\UpdatePerson;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Persons extends Resource
{
	/**
	 * @param string $account
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $relationshipdirector Filters on the list of people returned based on the person's relationship to the account's company.
	 * @param string $relationshipexecutive Filters on the list of people returned based on the person's relationship to the account's company.
	 * @param string $relationshipowner Filters on the list of people returned based on the person's relationship to the account's company.
	 * @param string $relationshiprepresentative Filters on the list of people returned based on the person's relationship to the account's company.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllPersons(
		string $account,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $relationshipdirector,
		?string $relationshipexecutive,
		?string $relationshipowner,
		?string $relationshiprepresentative,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllPersons($account, $endingBefore, $expand0, $expand1, $limit, $relationshipdirector, $relationshipexecutive, $relationshipowner, $relationshiprepresentative, $startingAfter));
	}


	/**
	 * @param string $account
	 */
	public function createPerson(string $account): Response
	{
		return $this->connector->send(new CreatePerson($account));
	}


	/**
	 * @param string $account
	 * @param string $person
	 */
	public function deletePerson(string $account, string $person): Response
	{
		return $this->connector->send(new DeletePerson($account, $person));
	}


	/**
	 * @param string $account
	 * @param string $person
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrievePerson(string $account, string $person, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrievePerson($account, $person, $expand0, $expand1));
	}


	/**
	 * @param string $account
	 * @param string $person
	 */
	public function updatePerson(string $account, string $person): Response
	{
		return $this->connector->send(new UpdatePerson($account, $person));
	}
}
