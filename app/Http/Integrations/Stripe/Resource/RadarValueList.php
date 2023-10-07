<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\RadarValueList\CreateValueList;
use App\Http\Integrations\Stripe\Requests\RadarValueList\DeleteValueList;
use App\Http\Integrations\Stripe\Requests\RadarValueList\ListAllValueLists;
use App\Http\Integrations\Stripe\Requests\RadarValueList\RetrieveValueList;
use App\Http\Integrations\Stripe\Requests\RadarValueList\UpdateValueList;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class RadarValueList extends Resource
{
	/**
	 * @param string $alias The alias used to reference the value list when writing rules.
	 * @param string $contains A value contained within a value list - returns all value lists containing this value.
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
	public function listAllValueLists(
		?string $alias,
		?string $contains,
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
		return $this->connector->send(new ListAllValueLists($alias, $contains, $createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	public function createValueList(): Response
	{
		return $this->connector->send(new CreateValueList());
	}


	/**
	 * @param string $valueList
	 */
	public function deleteValueList(string $valueList): Response
	{
		return $this->connector->send(new DeleteValueList($valueList));
	}


	/**
	 * @param string $valueList
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveValueList(string $valueList, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveValueList($valueList, $expand0, $expand1));
	}


	/**
	 * @param string $valueList
	 */
	public function updateValueList(string $valueList): Response
	{
		return $this->connector->send(new UpdateValueList($valueList));
	}
}
