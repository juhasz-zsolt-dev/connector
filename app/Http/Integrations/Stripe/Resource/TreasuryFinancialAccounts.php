<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccounts\CreateFinancialAccount;
use App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccounts\ListAllFinancialAccounts;
use App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccounts\RetrieveFinancialAccount;
use App\Http\Integrations\Stripe\Requests\TreasuryFinancialAccounts\UpdateFinancialAccount;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TreasuryFinancialAccounts extends Resource
{
	/**
	 * @param string $createdgt
	 * @param string $createdgte
	 * @param string $createdlt
	 * @param string $createdlte
	 * @param string $endingBefore An object ID cursor for use in pagination.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit ranging from 1 to 100 (defaults to 10).
	 * @param string $startingAfter An object ID cursor for use in pagination.
	 */
	public function listAllFinancialAccounts(
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllFinancialAccounts($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	public function createFinancialAccount(): Response
	{
		return $this->connector->send(new CreateFinancialAccount());
	}


	/**
	 * @param string $financialAccount
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveFinancialAccount(string $financialAccount, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveFinancialAccount($financialAccount, $expand0, $expand1));
	}


	/**
	 * @param string $financialAccount
	 */
	public function updateFinancialAccount(string $financialAccount): Response
	{
		return $this->connector->send(new UpdateFinancialAccount($financialAccount));
	}
}
