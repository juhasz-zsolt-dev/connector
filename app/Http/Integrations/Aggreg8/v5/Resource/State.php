<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\State\GetUserFlow;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class State extends Resource
{
    public function getUserFlow(string $userFlowId): Response
    {
        return $this->connector->send(new GetUserFlow($userFlowId));
    }
}
