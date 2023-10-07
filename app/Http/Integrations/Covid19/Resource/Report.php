<?php

namespace App\Http\Integrations\Covid19\Resource;

use App\Http\Integrations\Covid19\Requests\Report\Reports;
use App\Http\Integrations\Covid19\Requests\Report\Total;
use App\Http\Integrations\Covid19\Resource;
use Saloon\Http\Response;

class Report extends Resource
{
    /**
     * @param  string  $date The date of report in the format Y-m-d | default last added date
     * @param  string  $q The query string for search by country/region and province
     * @param  string  $iso Filter by country ISO code
     * @param  string  $regionName Filter by country/region name
     * @param  string  $regionProvince Filter by province name
     * @param  string  $cityName Filter by city name (only for ISO code = USA)
     */
    public function reports(
        ?string $date,
        ?string $q,
        ?string $iso,
        ?string $regionName,
        ?string $regionProvince,
        ?string $cityName,
    ): Response {
        return $this->connector->send(new Reports($date, $q, $iso, $regionName, $regionProvince, $cityName));
    }

    /**
     * @param  string  $date The date of report in the format Y-m-d | default last added date
     * @param  string  $iso Filter by country ISO code
     */
    public function total(?string $date, ?string $iso): Response
    {
        return $this->connector->send(new Total($date, $iso));
    }
}
