<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\DocumentBlock\ListDocumentBlock;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class DocumentBlock extends Resource
{
    /**
     * @param  string  $type Filter document blocks by type
     */
    public function listDocumentBlock(?int $page, ?string $type): Response
    {
        return $this->connector->send(new ListDocumentBlock($page, $type));
    }
}
