<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Init;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * init User Flow
 */
class InitUserFlow extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/user-flow/init';
    }

    public function __construct(
        protected mixed $flowType = null,
        protected mixed $email = null,
        protected mixed $redirectUri = null,
        protected mixed $infoSharingConsentId = null,
        protected mixed $prefill = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'flowType' => $this->flowType,
            'email' => $this->email,
            'redirectUri' => $this->redirectUri,
            'infoSharingConsentId' => $this->infoSharingConsentId,
            'prefill' => $this->prefill,
        ]);
    }
}
