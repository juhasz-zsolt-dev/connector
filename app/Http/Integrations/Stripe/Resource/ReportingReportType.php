<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\ReportingReportType\ListAllReportTypes;
use App\Http\Integrations\Stripe\Requests\ReportingReportType\RetrieveReportType;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class ReportingReportType extends Resource
{
	/**
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function listAllReportTypes(?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new ListAllReportTypes($expand0, $expand1));
	}


	/**
	 * @param string $reportType
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveReportType(string $reportType, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveReportType($reportType, $expand0, $expand1));
	}
}
