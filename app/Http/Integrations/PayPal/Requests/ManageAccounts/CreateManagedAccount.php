<?php

namespace App\Http\Integrations\PayPal\Requests\ManageAccounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create managed account
 */
class CreateManagedAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v3/customer/managed-accounts';
    }

    public function __construct(
        protected mixed $externalId = null,
        protected mixed $legalCountryCode = null,
        protected mixed $organization = null,
        protected mixed $userId = null,
        protected mixed $primaryCurrencyCode = null,
        protected mixed $individualOwners = null,
        protected mixed $businessEntity = null,
        protected mixed $agreements = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'external_id' => $this->externalId,
            'legal_country_code' => $this->legalCountryCode,
            'organization' => $this->organization,
            'user_id' => $this->userId,
            'primary_currency_code' => $this->primaryCurrencyCode,
            'individual_owners' => $this->individualOwners,
            'business_entity' => $this->businessEntity,
            'agreements' => $this->agreements,
        ]);
    }
}
