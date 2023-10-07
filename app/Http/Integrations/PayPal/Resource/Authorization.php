<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Authorization\GenerateAccessToken;
use App\Http\Integrations\PayPal\Requests\Authorization\GenerateClientToken;
use App\Http\Integrations\PayPal\Requests\Authorization\TerminateAccessToken;
use App\Http\Integrations\PayPal\Requests\Authorization\UserInfo;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Authorization extends Resource
{
	public function generateAccessToken(): Response
	{
		return $this->connector->send(new GenerateAccessToken());
	}


	public function terminateAccessToken(): Response
	{
		return $this->connector->send(new TerminateAccessToken());
	}


	/**
	 * @param string $schema (Required) Filters the response by a schema. Supported value is `paypalv1.1`.
	 */
	public function userInfo(?string $schema): Response
	{
		return $this->connector->send(new UserInfo($schema));
	}


	/**
	 * @param mixed $customerId
	 */
	public function generateClientToken(mixed $customerId): Response
	{
		return $this->connector->send(new GenerateClientToken($customerId));
	}
}
