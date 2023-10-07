<?php

namespace App\Http\Integrations\Stripe\Requests\IssuingCards;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Ship a testmode card
 */
class ShipTestmodeCard extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/v1/test_helpers/issuing/cards/{$this->card}/shipping/ship";
    }

    public function __construct(
        protected string $card,
    ) {
    }
}
