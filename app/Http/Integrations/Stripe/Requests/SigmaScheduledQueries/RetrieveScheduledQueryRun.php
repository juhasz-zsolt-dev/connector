<?php

namespace App\Http\Integrations\Stripe\Requests\SigmaScheduledQueries;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrieve a scheduled query run
 */
class RetrieveScheduledQueryRun extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/sigma/scheduled_query_runs/{$this->scheduledQueryRun}";
	}


	/**
	 * @param string $scheduledQueryRun
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function __construct(
		protected string $scheduledQueryRun,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['expand[0]' => $this->expand0, 'expand[1]' => $this->expand1]);
	}
}
