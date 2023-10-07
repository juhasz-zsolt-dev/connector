<?php

namespace App\Http\Integrations\Stripe\Requests\ReportingReportRuns;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a report run
 */
class CreateReportRun extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/reporting/report_runs";
	}


	public function __construct()
	{
	}
}
