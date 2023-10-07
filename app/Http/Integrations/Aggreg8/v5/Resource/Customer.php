<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Customer\GetCustomer;
use App\Http\Integrations\Aggreg8\v5\Requests\Customer\UpdateCustomer;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Customer extends Resource
{
	public function getCustomer(): Response
	{
		return $this->connector->send(new GetCustomer());
	}


	/**
	 * @param mixed $dataHandlingPurposes
	 * @param mixed $availableBankIds
	 * @param mixed $contactInfo
	 * @param mixed $callbacks
	 * @param mixed $colors
	 */
	public function updateCustomer(
		mixed $dataHandlingPurposes,
		mixed $availableBankIds,
		mixed $contactInfo,
		mixed $callbacks,
		mixed $colors,
	): Response
	{
		return $this->connector->send(new UpdateCustomer($dataHandlingPurposes, $availableBankIds, $contactInfo, $callbacks, $colors));
	}
}
