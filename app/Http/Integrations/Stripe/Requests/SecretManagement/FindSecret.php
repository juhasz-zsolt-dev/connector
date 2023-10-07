<?php

namespace App\Http\Integrations\Stripe\Requests\SecretManagement;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Find a secret
 */
class FindSecret extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/apps/secrets/find";
	}


	/**
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $name (Required) A name for the secret that's unique within the scope.
	 * @param null|string $scopetype (Required) Specifies the scoping of the secret. Requests originating from UI extensions can only access account-scoped secrets or secrets scoped to their own user.
	 * @param null|string $scopeuser (Required) Specifies the scoping of the secret. Requests originating from UI extensions can only access account-scoped secrets or secrets scoped to their own user.
	 */
	public function __construct(
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $name = null,
		protected ?string $scopetype = null,
		protected ?string $scopeuser = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'name' => $this->name,
			'scope[type]' => $this->scopetype,
			'scope[user]' => $this->scopeuser,
		]);
	}
}
