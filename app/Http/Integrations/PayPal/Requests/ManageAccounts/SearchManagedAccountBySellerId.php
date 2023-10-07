<?php

namespace App\Http\Integrations\PayPal\Requests\ManageAccounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Search managed account by Seller Id
 */
class SearchManagedAccountBySellerId extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v3/customer/managed-accounts/{$this->id}";
    }

    /**
     * @param  null|string  $views (Optional) The `views` query parameter can be used to request `process_view` in addition to the default GET response.
     */
    public function __construct(
        protected string $id,
        protected ?string $views = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['views' => $this->views]);
    }
}
