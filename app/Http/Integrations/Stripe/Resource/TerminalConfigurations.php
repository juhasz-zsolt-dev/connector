<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TerminalConfigurations\CreateConfiguration;
use App\Http\Integrations\Stripe\Requests\TerminalConfigurations\DeleteConfiguration;
use App\Http\Integrations\Stripe\Requests\TerminalConfigurations\ListAllConfigurations;
use App\Http\Integrations\Stripe\Requests\TerminalConfigurations\RetrieveConfiguration;
use App\Http\Integrations\Stripe\Requests\TerminalConfigurations\UpdateConfiguration;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TerminalConfigurations extends Resource
{
	/**
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $isAccountDefault if present, only return the account default or non-default configurations.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllConfigurations(
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $isAccountDefault,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllConfigurations($endingBefore, $expand0, $expand1, $isAccountDefault, $limit, $startingAfter));
	}


	public function createConfiguration(): Response
	{
		return $this->connector->send(new CreateConfiguration());
	}


	/**
	 * @param string $configuration
	 */
	public function deleteConfiguration(string $configuration): Response
	{
		return $this->connector->send(new DeleteConfiguration($configuration));
	}


	/**
	 * @param string $configuration
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveConfiguration(string $configuration, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveConfiguration($configuration, $expand0, $expand1));
	}


	/**
	 * @param string $configuration
	 */
	public function updateConfiguration(string $configuration): Response
	{
		return $this->connector->send(new UpdateConfiguration($configuration));
	}
}
