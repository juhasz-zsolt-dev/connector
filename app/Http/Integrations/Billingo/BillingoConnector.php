<?php

namespace App\Http\Integrations\Billingo;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class BillingoConnector extends Connector
{
    use AcceptsJson;

    public function __construct(private string $apiKey)
    {
    }

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return config('integrations.baseUrl.billingo');
    }

    /**
     * Default headers for every request
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'x-api-key' => $this->apiKey,
        ];
    }

    /**
     * Default HTTP client options
     *
     * @return string[]
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}
