<?php

namespace App\Http\Integrations\PayPal\Requests\Subscriptions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show subscription details
 */
class ShowSubscriptionDetails extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/billing/subscriptions/{$this->subscriptionId}";
	}


	/**
	 * @param string $subscriptionId
	 * @param null|string $fields List of fields that are to be returned in the response. Possible value for fields are last_failed_payment and plan.
	 */
	public function __construct(
		protected string $subscriptionId,
		protected ?string $fields = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['fields' => $this->fields]);
	}
}
