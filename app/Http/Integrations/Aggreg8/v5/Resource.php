<?php

namespace App\Http\Integrations\Aggreg8\v5;

use Saloon\Http\Connector;

class Resource
{
    public function __construct(
        protected Connector $connector,
    ) {
    }
}
