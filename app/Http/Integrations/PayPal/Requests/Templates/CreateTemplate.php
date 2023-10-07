<?php

namespace App\Http\Integrations\PayPal\Requests\Templates;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create template
 */
class CreateTemplate extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v2/invoicing/templates";
	}


	/**
	 * @param null|mixed $name
	 * @param null|mixed $defaultTemplate
	 * @param null|mixed $templateInfo
	 * @param null|mixed $settings
	 * @param null|mixed $unitOfMeasure
	 * @param null|mixed $standardTemplate
	 */
	public function __construct(
		protected mixed $name = null,
		protected mixed $defaultTemplate = null,
		protected mixed $templateInfo = null,
		protected mixed $settings = null,
		protected mixed $unitOfMeasure = null,
		protected mixed $standardTemplate = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'name' => $this->name,
			'default_template' => $this->defaultTemplate,
			'template_info' => $this->templateInfo,
			'settings' => $this->settings,
			'unit_of_measure' => $this->unitOfMeasure,
			'standard_template' => $this->standardTemplate,
		]);
	}
}
