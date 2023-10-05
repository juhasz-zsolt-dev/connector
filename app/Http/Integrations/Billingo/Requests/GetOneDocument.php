<?php

namespace App\Http\Integrations\Billingo\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class GetOneDocument extends Request
{
    public function __construct(protected int $id){
    }
    /**
     * Define the HTTP method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    /**
     * Define the endpoint for the request
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return "/documents/{$this->id}";
    }
}
