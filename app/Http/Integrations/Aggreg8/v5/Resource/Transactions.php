<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Transactions\GetTransactionById;
use App\Http\Integrations\Aggreg8\v5\Requests\Transactions\GetTransactionsFromCache;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Transactions extends Resource
{
    /**
     * @param  string  $accountId If specified, Transactions will be filtered by account ID.
     * @param  string  $status If specified, Transactions will be filtered by status.
     * @param  string  $page Transactions will be returned from this page. If the parameter is not specified the endpoint returns Transactions from the first page. A page contains maximum 200 transactions.
     */
    public function getTransactionsFromCache(
        string $userFlowId,
        ?string $accountId,
        ?string $status,
        ?string $page,
    ): Response {
        return $this->connector->send(new GetTransactionsFromCache($userFlowId, $accountId, $status, $page));
    }

    public function getTransactionById(string $transactionId): Response
    {
        return $this->connector->send(new GetTransactionById($transactionId));
    }
}
