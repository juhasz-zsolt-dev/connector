<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Logo;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Bank Logo
 */
class GetBankLogo extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/banks/{$this->bankId}/logo";
    }

    public function __construct(
        protected string $bankId,
    ) {
    }
}
