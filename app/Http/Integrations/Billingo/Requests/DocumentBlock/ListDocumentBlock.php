<?php

namespace App\Http\Integrations\Billingo\Requests\DocumentBlock;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListDocumentBlock
 *
 * Returns a list of your document blocks. The document blocks are returned sorted by creation date,
 * with the most recent document blocks appearing first.
 */
class ListDocumentBlock extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/document-blocks';
    }

    /**
     * @param  null|string  $type Filter document blocks by type
     */
    public function __construct(
        protected ?int $page = null,
        protected ?string $type = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'type' => $this->type]);
    }
}
