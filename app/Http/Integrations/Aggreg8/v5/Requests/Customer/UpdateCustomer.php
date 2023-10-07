<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Customer;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * update Customer
 */
class UpdateCustomer extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/customer";
	}


	/**
	 * @param null|mixed $dataHandlingPurposes
	 * @param null|mixed $availableBankIds
	 * @param null|mixed $contactInfo
	 * @param null|mixed $callbacks
	 * @param null|mixed $colors
	 */
	public function __construct(
		protected mixed $dataHandlingPurposes = null,
		protected mixed $availableBankIds = null,
		protected mixed $contactInfo = null,
		protected mixed $callbacks = null,
		protected mixed $colors = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'dataHandlingPurposes' => $this->dataHandlingPurposes,
			'availableBankIds' => $this->availableBankIds,
			'contactInfo' => $this->contactInfo,
			'callbacks' => $this->callbacks,
			'colors' => $this->colors,
		]);
	}
}
