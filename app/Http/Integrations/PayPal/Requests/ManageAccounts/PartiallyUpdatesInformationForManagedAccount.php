<?php

namespace App\Http\Integrations\PayPal\Requests\ManageAccounts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Partially updates information for a managed account
 */
class PartiallyUpdatesInformationForManagedAccount extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function resolveEndpoint(): string
    {
        return "/v3/customer/managed-accounts/{$this->id}";
    }

    public function __construct(
        protected string $id,
        protected ?array $values = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['values' => $this->values]);
    }
}
