<?php

namespace App\Http\Integrations\PayPal\Requests\ManageAccounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Search managed account through external id
 */
class SearchManagedAccountThroughExternalId extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v3/customer/managed-accounts';
    }

    /**
     * @param  null|string  $externalId The `external_id` query parameter can be used to request managed accounts with the given external_id. Searches for the managed account that has the given external_id. To locate a particular account, you should set this to the same value that you provided in the /external_id property in your Create Managed Account request.
     * @param  null|string  $views (Optional) The `views` query parameter can be used to request `process_view` in addition to the default GET response. A comma-separated list of data sets that should be returned in the response. The only allowed value here is process_view, which indicates that the process_view property should be populated in the response; this property contains information on the regulatory processes that must be completed for this merchant.
     */
    public function __construct(
        protected ?string $externalId = null,
        protected ?string $views = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['external_id' => $this->externalId, 'views' => $this->views]);
    }
}
