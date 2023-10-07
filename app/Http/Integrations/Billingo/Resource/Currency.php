<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Currency\GetConversionRate;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class Currency extends Resource
{
    public function getConversionRate(string $from, string $to, ?string $date): Response
    {
        return $this->connector->send(new GetConversionRate($from, $to, $date));
    }
}
