<?php

namespace App\Http\Integrations\Billingo\Requests\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * PosPrint
 *
 * Returns a printable POS PDF file of a particular document.
 */
class PosPrint extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}/print/pos";
    }

    /**
     * @param  float|int  $size In which size the POS PDF should be rendered.
     */
    public function __construct(
        protected int $id,
        protected float|int $size,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['size' => $this->size]);
    }
}
