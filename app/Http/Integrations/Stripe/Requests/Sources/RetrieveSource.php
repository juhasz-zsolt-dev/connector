<?php

namespace App\Http\Integrations\Stripe\Requests\Sources;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrieve a source
 */
class RetrieveSource extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/sources/{$this->source}";
	}


	/**
	 * @param string $source
	 * @param null|string $clientSecret The client secret of the source. Required if a publishable key is used to retrieve the source.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function __construct(
		protected string $source,
		protected ?string $clientSecret = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['client_secret' => $this->clientSecret, 'expand[0]' => $this->expand0, 'expand[1]' => $this->expand1]);
	}
}
