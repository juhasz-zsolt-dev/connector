<?php

namespace App\Http\Integrations\Covid19\Resource;

use App\Http\Integrations\Covid19\Requests\Region\Provinces;
use App\Http\Integrations\Covid19\Requests\Region\Regions;
use App\Http\Integrations\Covid19\Resource;
use Saloon\Http\Response;

class Region extends Resource
{
    /**
     * @param  string  $order Region list sorting.
     * @param  string  $sort Sort directions.
     */
    public function regions(?string $order, ?string $sort): Response
    {
        return $this->connector->send(new Regions($order, $sort));
    }

    /**
     * @param  string  $iso The ISO code
     * @param  string  $order Province list sorting.
     * @param  string  $sort Sort directions.
     */
    public function provinces(string $iso, ?string $order, ?string $sort): Response
    {
        return $this->connector->send(new Provinces($iso, $order, $sort));
    }
}
