<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Users;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get User
 */
class GetUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/users/{$this->userId}";
	}


	/**
	 * @param string $userId
	 */
	public function __construct(
		protected string $userId,
	) {
	}
}
