<?php

namespace App\Http\Integrations\Stripe\Requests\RadarFraudEarlyWarnings;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrieve an early fraud warning
 */
class RetrieveEarlyFraudWarning extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/radar/early_fraud_warnings/{$this->earlyFraudWarning}";
	}


	/**
	 * @param string $earlyFraudWarning
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function __construct(
		protected string $earlyFraudWarning,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['expand[0]' => $this->expand0, 'expand[1]' => $this->expand1]);
	}
}
