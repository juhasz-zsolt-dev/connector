<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\ConsentedAccounts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * remove Consented Account
 */
class RemoveConsentedAccount extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/info-sharing-consents/{$this->infoSharingConsentId}/consentedAccounts/{$this->accountId}";
	}


	/**
	 * @param string $infoSharingConsentId
	 * @param string $accountId
	 */
	public function __construct(
		protected string $infoSharingConsentId,
		protected string $accountId,
	) {
	}
}
