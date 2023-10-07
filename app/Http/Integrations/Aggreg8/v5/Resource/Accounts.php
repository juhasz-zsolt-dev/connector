<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Accounts\GetAccountById;
use App\Http\Integrations\Aggreg8\v5\Requests\Accounts\GetAccountsFromCache;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Accounts extends Resource
{
	/**
	 * @param string $userFlowId
	 */
	public function getAccountsFromCache(string $userFlowId): Response
	{
		return $this->connector->send(new GetAccountsFromCache($userFlowId));
	}


	/**
	 * @param string $accountId
	 */
	public function getAccountById(string $accountId): Response
	{
		return $this->connector->send(new GetAccountById($accountId));
	}
}
