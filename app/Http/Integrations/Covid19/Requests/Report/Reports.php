<?php

namespace App\Http\Integrations\Covid19\Requests\Report;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * reports
 */
class Reports extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/reports";
	}


	/**
	 * @param null|string $date The date of report in the format Y-m-d | default last added date
	 * @param null|string $q The query string for search by country/region and province
	 * @param null|string $iso Filter by country ISO code
	 * @param null|string $regionName Filter by country/region name
	 * @param null|string $regionProvince Filter by province name
	 * @param null|string $cityName Filter by city name (only for ISO code = USA)
	 */
	public function __construct(
		protected ?string $date = null,
		protected ?string $q = null,
		protected ?string $iso = null,
		protected ?string $regionName = null,
		protected ?string $regionProvince = null,
		protected ?string $cityName = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'date' => $this->date,
			'q' => $this->q,
			'iso' => $this->iso,
			'region_name' => $this->regionName,
			'region_province' => $this->regionProvince,
			'city_name' => $this->cityName,
		]);
	}
}
