<?php

namespace App\Http\Integrations\Covid19;

use App\Http\Integrations\Covid19\Resource\Region;
use App\Http\Integrations\Covid19\Resource\Report;
use Saloon\Http\Connector;

/**
 * Covid API
 */
class Covid19 extends Connector
{
	public function resolveBaseUrl(): string
	{
		return '/api';
	}


	public function region(): Region
	{
		return new Region($this);
	}


	public function report(): Report
	{
		return new Report($this);
	}
}
