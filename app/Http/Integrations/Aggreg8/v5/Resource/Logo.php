<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Logo\GetBankLogo;
use App\Http\Integrations\Aggreg8\v5\Requests\Logo\GetCustomerLogo;
use App\Http\Integrations\Aggreg8\v5\Requests\Logo\UpdateCustomerLogo;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Logo extends Resource
{
	/**
	 * @param string $bankId
	 */
	public function getBankLogo(string $bankId): Response
	{
		return $this->connector->send(new GetBankLogo($bankId));
	}


	public function getCustomerLogo(): Response
	{
		return $this->connector->send(new GetCustomerLogo());
	}


	/**
	 * @param mixed $dataUri
	 */
	public function updateCustomerLogo(mixed $dataUri): Response
	{
		return $this->connector->send(new UpdateCustomerLogo($dataUri));
	}
}
