<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Users\GetUser;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Users extends Resource
{
	/**
	 * @param string $userId
	 */
	public function getUser(string $userId): Response
	{
		return $this->connector->send(new GetUser($userId));
	}
}
