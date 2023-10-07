<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\ConsentedAccounts\RemoveConsentedAccount;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class ConsentedAccounts extends Resource
{
    public function removeConsentedAccount(string $infoSharingConsentId, string $accountId): Response
    {
        return $this->connector->send(new RemoveConsentedAccount($infoSharingConsentId, $accountId));
    }
}
