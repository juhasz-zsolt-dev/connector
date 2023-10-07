<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Init\InitUserFlow;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Init extends Resource
{
    public function initUserFlow(
        mixed $flowType,
        mixed $email,
        mixed $redirectUri,
        mixed $infoSharingConsentId,
        mixed $prefill,
    ): Response {
        return $this->connector->send(new InitUserFlow($flowType, $email, $redirectUri, $infoSharingConsentId, $prefill));
    }
}
