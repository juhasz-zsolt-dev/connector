<?php

namespace App\Http\Integrations\Stripe\Requests\SetupIntents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Confirm a SetupIntent
 */
class ConfirmSetupIntent extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/setup_intents/{$this->intent}/confirm";
    }

    public function __construct(
        protected string $intent,
    ) {
    }
}
