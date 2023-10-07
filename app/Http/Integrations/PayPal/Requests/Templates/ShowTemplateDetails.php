<?php

namespace App\Http\Integrations\PayPal\Requests\Templates;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Show template details
 */
class ShowTemplateDetails extends Request
{
	protected Method $method = Method::GET;


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
