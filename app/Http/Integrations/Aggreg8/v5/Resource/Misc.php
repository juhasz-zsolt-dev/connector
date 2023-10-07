<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Misc\AddUser;
use App\Http\Integrations\Aggreg8\v5\Requests\Misc\DeleteInfoSharingConsentById;
use App\Http\Integrations\Aggreg8\v5\Requests\Misc\GetAccounts;
use App\Http\Integrations\Aggreg8\v5\Requests\Misc\GetBanks;
use App\Http\Integrations\Aggreg8\v5\Requests\Misc\GetCategories;
use App\Http\Integrations\Aggreg8\v5\Requests\Misc\GetInfoSharingConsents;
use App\Http\Integrations\Aggreg8\v5\Requests\Misc\GetTransactions;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Misc extends Resource
{
    public function addUser(mixed $id, mixed $email): Response
    {
        return $this->connector->send(new AddUser($id, $email));
    }

    /**
     * @param  string  $userId (Required) ID of the User.
     */
    public function getAccounts(?string $userId): Response
    {
        return $this->connector->send(new GetAccounts($userId));
    }

    /**
     * @param  string  $userId (Required) ID of the User.
     * @param  string  $accountId If specified, Transactions will be filtered by Account ID.
     * @param  string  $status If specified, Transactions will be filtered by status.
     * @param  string  $fromBookingDateTime The UTC ISO 8601 Date Time to filter Transactions FROM. Time component is optional - set to 00:00:00 if only the Date component is specified.
     * @param  string  $toBookingDateTime The UTC ISO 8601 Date Time to filter Transactions TO. Time component is optional - set to 00:00:00 if only the Date component is specified.
     * @param  string  $fromOrdinalOnAccount The ordinalOnAccount to filter the booked Transactions FROM (inclusive). If specified, only booked transactions will be returned.
     * @param  string  $toOrdinalOnAccount The ordinalOnAccount to filter the booked Transactions FROM (inclusive). If specified, only booked transactions will be returned.
     * @param  string  $page Transactions will be returned from this page. If the parameter is not specified the endpoint returns Transactions from the first page. A page contains maximum 200 Transactions.
     */
    public function getTransactions(
        ?string $userId,
        ?string $accountId,
        ?string $status,
        ?string $fromBookingDateTime,
        ?string $toBookingDateTime,
        ?string $fromOrdinalOnAccount,
        ?string $toOrdinalOnAccount,
        ?string $page,
    ): Response {
        return $this->connector->send(new GetTransactions($userId, $accountId, $status, $fromBookingDateTime, $toBookingDateTime, $fromOrdinalOnAccount, $toOrdinalOnAccount, $page));
    }

    public function getCategories(): Response
    {
        return $this->connector->send(new GetCategories());
    }

    public function getBanks(): Response
    {
        return $this->connector->send(new GetBanks());
    }

    public function deleteInfoSharingConsentById(string $infoSharingConsentId): Response
    {
        return $this->connector->send(new DeleteInfoSharingConsentById($infoSharingConsentId));
    }

    /**
     * @param  string  $userId (Required) ID of the User.
     */
    public function getInfoSharingConsents(?string $userId): Response
    {
        return $this->connector->send(new GetInfoSharingConsents($userId));
    }
}
