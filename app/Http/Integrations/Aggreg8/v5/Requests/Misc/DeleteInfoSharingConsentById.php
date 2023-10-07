<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Misc;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * delete Info Sharing Consent By Id
 */
class DeleteInfoSharingConsentById extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/info-sharing-consents/{$this->infoSharingConsentId}";
    }

    public function __construct(
        protected string $infoSharingConsentId,
    ) {
    }
}
