<?php

namespace App\Http\Integrations\Stripe\Requests\TreasuryDebitReversals;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create a DebitReversal
 */
class CreateDebitReversal extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/v1/treasury/debit_reversals';
    }

    public function __construct()
    {
    }
}
