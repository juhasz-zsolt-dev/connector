<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Accounts\GetAccountById;
use App\Http\Integrations\Aggreg8\v5\Requests\Accounts\GetAccountsFromCache;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Accounts extends Resource
{
    public function getAccountsFromCache(string $userFlowId): Response
    {
        return $this->connector->send(new GetAccountsFromCache($userFlowId));
    }

    public function getAccountById(string $accountId): Response
    {
        return $this->connector->send(new GetAccountById($accountId));
    }
}
