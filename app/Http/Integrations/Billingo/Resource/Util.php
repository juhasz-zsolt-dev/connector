<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Util\CheckTaxNumber;
use App\Http\Integrations\Billingo\Requests\Util\GetId;
use App\Http\Integrations\Billingo\Requests\Util\GetServerTime;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class Util extends Resource
{
    public function checkTaxNumber(string $taxNumber): Response
    {
        return $this->connector->send(new CheckTaxNumber($taxNumber));
    }

    public function getId(int $id): Response
    {
        return $this->connector->send(new GetId($id));
    }

    public function getServerTime(): Response
    {
        return $this->connector->send(new GetServerTime());
    }
}
