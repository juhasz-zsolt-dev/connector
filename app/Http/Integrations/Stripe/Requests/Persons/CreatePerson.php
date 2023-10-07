<?php

namespace App\Http\Integrations\Stripe\Requests\Persons;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a person
 */
class CreatePerson extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/accounts/{$this->account}/persons";
	}


	/**
	 * @param string $account
	 */
	public function __construct(
		protected string $account,
	) {
	}
}
