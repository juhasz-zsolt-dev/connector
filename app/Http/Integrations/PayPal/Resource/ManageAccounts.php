<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\ManageAccounts\CreateManagedAccount;
use App\Http\Integrations\PayPal\Requests\ManageAccounts\PartiallyUpdatesInformationForManagedAccount;
use App\Http\Integrations\PayPal\Requests\ManageAccounts\SearchManagedAccountBySellerId;
use App\Http\Integrations\PayPal\Requests\ManageAccounts\SearchManagedAccountThroughExternalId;
use App\Http\Integrations\PayPal\Requests\ManageAccounts\ShowsCollectionOfRegisteredWalletDomains;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class ManageAccounts extends Resource
{
	/**
	 * @param mixed $externalId
	 * @param mixed $legalCountryCode
	 * @param mixed $organization
	 * @param mixed $userId
	 * @param mixed $primaryCurrencyCode
	 * @param mixed $individualOwners
	 * @param mixed $businessEntity
	 * @param mixed $agreements
	 */
	public function createManagedAccount(
		mixed $externalId,
		mixed $legalCountryCode,
		mixed $organization,
		mixed $userId,
		mixed $primaryCurrencyCode,
		mixed $individualOwners,
		mixed $businessEntity,
		mixed $agreements,
	): Response
	{
		return $this->connector->send(new CreateManagedAccount($externalId, $legalCountryCode, $organization, $userId, $primaryCurrencyCode, $individualOwners, $businessEntity, $agreements));
	}


	/**
	 * @param string $externalId The `external_id` query parameter can be used to request managed accounts with the given external_id. Searches for the managed account that has the given external_id. To locate a particular account, you should set this to the same value that you provided in the /external_id property in your Create Managed Account request.
	 * @param string $views (Optional) The `views` query parameter can be used to request `process_view` in addition to the default GET response. A comma-separated list of data sets that should be returned in the response. The only allowed value here is process_view, which indicates that the process_view property should be populated in the response; this property contains information on the regulatory processes that must be completed for this merchant.
	 */
	public function searchManagedAccountThroughExternalId(?string $externalId, ?string $views): Response
	{
		return $this->connector->send(new SearchManagedAccountThroughExternalId($externalId, $views));
	}


	/**
	 * @param string $id
	 * @param string $views (Optional) The `views` query parameter can be used to request `process_view` in addition to the default GET response.
	 */
	public function searchManagedAccountBySellerId(string $id, ?string $views): Response
	{
		return $this->connector->send(new SearchManagedAccountBySellerId($id, $views));
	}


	/**
	 * @param string $id
	 * @param array $values
	 */
	public function partiallyUpdatesInformationForManagedAccount(string $id, ?array $values): Response
	{
		return $this->connector->send(new PartiallyUpdatesInformationForManagedAccount($id, $values));
	}


	/**
	 * @param string $id
	 */
	public function showsCollectionOfRegisteredWalletDomains(string $id): Response
	{
		return $this->connector->send(new ShowsCollectionOfRegisteredWalletDomains($id));
	}
}
