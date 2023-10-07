<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\SecretManagement\DeleteSecret;
use App\Http\Integrations\Stripe\Requests\SecretManagement\FindSecret;
use App\Http\Integrations\Stripe\Requests\SecretManagement\ListSecrets;
use App\Http\Integrations\Stripe\Requests\SecretManagement\SetSecret;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class SecretManagement extends Resource
{
	/**
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $scopetype (Required) Specifies the scoping of the secret. Requests originating from UI extensions can only access account-scoped secrets or secrets scoped to their own user.
	 * @param string $scopeuser (Required) Specifies the scoping of the secret. Requests originating from UI extensions can only access account-scoped secrets or secrets scoped to their own user.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listSecrets(
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $scopetype,
		?string $scopeuser,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListSecrets($endingBefore, $expand0, $expand1, $limit, $scopetype, $scopeuser, $startingAfter));
	}


	public function setSecret(): Response
	{
		return $this->connector->send(new SetSecret());
	}


	public function deleteSecret(): Response
	{
		return $this->connector->send(new DeleteSecret());
	}


	/**
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $name (Required) A name for the secret that's unique within the scope.
	 * @param string $scopetype (Required) Specifies the scoping of the secret. Requests originating from UI extensions can only access account-scoped secrets or secrets scoped to their own user.
	 * @param string $scopeuser (Required) Specifies the scoping of the secret. Requests originating from UI extensions can only access account-scoped secrets or secrets scoped to their own user.
	 */
	public function findSecret(
		?string $expand0,
		?string $expand1,
		?string $name,
		?string $scopetype,
		?string $scopeuser,
	): Response
	{
		return $this->connector->send(new FindSecret($expand0, $expand1, $name, $scopetype, $scopeuser));
	}
}
