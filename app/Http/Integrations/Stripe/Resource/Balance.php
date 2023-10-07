<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Balance\RetrieveBalance;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Balance extends Resource
{
	/**
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveBalance(?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveBalance($expand0, $expand1));
	}
}
