<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TerminalConnectionTokens\CreateConnectionToken;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TerminalConnectionTokens extends Resource
{
    public function createConnectionToken(): Response
    {
        return $this->connector->send(new CreateConnectionToken());
    }
}
