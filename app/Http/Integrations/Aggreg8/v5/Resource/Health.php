<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Health\Health as HealthRequest;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Health extends Resource
{
    public function health(): Response
    {
        return $this->connector->send(new HealthRequest());
    }
}
