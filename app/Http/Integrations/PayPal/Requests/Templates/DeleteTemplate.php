<?php

namespace App\Http\Integrations\PayPal\Requests\Templates;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete template
 */
class DeleteTemplate extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/v2/invoicing/templates/{$this->templateId}";
	}


	/**
	 * @param string $templateId
	 */
	public function __construct(
		protected string $templateId,
	) {
	}
}
