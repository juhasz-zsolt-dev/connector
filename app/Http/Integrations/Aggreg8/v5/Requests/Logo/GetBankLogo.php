<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Logo;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Bank Logo
 */
class GetBankLogo extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/banks/{$this->bankId}/logo";
	}


	/**
	 * @param string $bankId
	 */
	public function __construct(
		protected string $bankId,
	) {
	}
}
