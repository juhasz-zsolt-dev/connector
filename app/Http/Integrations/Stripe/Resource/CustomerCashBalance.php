<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\CustomerCashBalance\RetrieveCashBalance;
use App\Http\Integrations\Stripe\Requests\CustomerCashBalance\UpdateCashBalanceSettings;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class CustomerCashBalance extends Resource
{
	/**
	 * @param string $customer
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveCashBalance(string $customer, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveCashBalance($customer, $expand0, $expand1));
	}


	/**
	 * @param string $customer
	 */
	public function updateCashBalanceSettings(string $customer): Response
	{
		return $this->connector->send(new UpdateCashBalanceSettings($customer));
	}
}
