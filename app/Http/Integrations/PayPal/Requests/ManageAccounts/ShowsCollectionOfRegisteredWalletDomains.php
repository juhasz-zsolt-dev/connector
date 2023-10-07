<?php

namespace App\Http\Integrations\PayPal\Requests\ManageAccounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Shows collection of registered wallet domains
 */
class ShowsCollectionOfRegisteredWalletDomains extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v3/customer/managed-accounts/{$this->id}/wallet-domains";
    }

    public function __construct(
        protected string $id,
    ) {
    }
}
