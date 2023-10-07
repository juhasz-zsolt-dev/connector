<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccountFeatures\RetrieveFinancialAccountFeatures;
use App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccountFeatures\UpdateFinancialAccountFeatures;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryFinancialAccountFeatures extends Resource
{
	/**
	 * @param string $financialAccount
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveFinancialAccountFeatures(
		string $financialAccount,
		?string $expand0,
		?string $expand1,
	): Response
	{
		return $this->connector->send(new RetrieveFinancialAccountFeatures($financialAccount, $expand0, $expand1));
	}


	/**
	 * @param string $financialAccount
	 */
	public function updateFinancialAccountFeatures(string $financialAccount): Response
	{
		return $this->connector->send(new UpdateFinancialAccountFeatures($financialAccount));
	}
}
