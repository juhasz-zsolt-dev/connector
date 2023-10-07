<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Accounts\CreateAccount;
use App\Http\Integrations\Stripe\Requests\Accounts\CreateAccountLink;
use App\Http\Integrations\Stripe\Requests\Accounts\CreateBankAccountOrCard;
use App\Http\Integrations\Stripe\Requests\Accounts\CreateLoginLink;
use App\Http\Integrations\Stripe\Requests\Accounts\DeleteAccount;
use App\Http\Integrations\Stripe\Requests\Accounts\DeleteBankAccountOrCard;
use App\Http\Integrations\Stripe\Requests\Accounts\ListAllAccountCapabilities;
use App\Http\Integrations\Stripe\Requests\Accounts\ListAllConnectedAccounts;
use App\Http\Integrations\Stripe\Requests\Accounts\RejectAccount;
use App\Http\Integrations\Stripe\Requests\Accounts\RetrieveAccount;
use App\Http\Integrations\Stripe\Requests\Accounts\RetrieveAccountCapability;
use App\Http\Integrations\Stripe\Requests\Accounts\RetrieveAllBankAccountsOrCards;
use App\Http\Integrations\Stripe\Requests\Accounts\RetrieveBankAccountOrCard;
use App\Http\Integrations\Stripe\Requests\Accounts\UpdateAccount;
use App\Http\Integrations\Stripe\Requests\Accounts\UpdateAccountCapability;
use App\Http\Integrations\Stripe\Requests\Accounts\UpdateBankAccountOrCard;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Accounts extends Resource
{
    public function createAccountLink(): Response
    {
        return $this->connector->send(new CreateAccountLink());
    }

    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllConnectedAccounts(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllConnectedAccounts($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
    }

    public function createAccount(): Response
    {
        return $this->connector->send(new CreateAccount());
    }

    public function deleteAccount(string $account): Response
    {
        return $this->connector->send(new DeleteAccount($account));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveAccount(string $account, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveAccount($account, $expand0, $expand1));
    }

    public function updateAccount(string $account): Response
    {
        return $this->connector->send(new UpdateAccount($account));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function listAllAccountCapabilities(string $account, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new ListAllAccountCapabilities($account, $expand0, $expand1));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveAccountCapability(
        string $account,
        string $capability,
        ?string $expand0,
        ?string $expand1,
    ): Response {
        return $this->connector->send(new RetrieveAccountCapability($account, $capability, $expand0, $expand1));
    }

    public function updateAccountCapability(string $account, string $capability): Response
    {
        return $this->connector->send(new UpdateAccountCapability($account, $capability));
    }

    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function retrieveAllBankAccountsOrCards(
        string $account,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new RetrieveAllBankAccountsOrCards($account, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
    }

    public function createBankAccountOrCard(string $account): Response
    {
        return $this->connector->send(new CreateBankAccountOrCard($account));
    }

    public function deleteBankAccountOrCard(string $account, string $id): Response
    {
        return $this->connector->send(new DeleteBankAccountOrCard($account, $id));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveBankAccountOrCard(string $account, string $id, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveBankAccountOrCard($account, $id, $expand0, $expand1));
    }

    public function updateBankAccountOrCard(string $account, string $id): Response
    {
        return $this->connector->send(new UpdateBankAccountOrCard($account, $id));
    }

    public function createLoginLink(string $account): Response
    {
        return $this->connector->send(new CreateLoginLink($account));
    }

    public function rejectAccount(string $account): Response
    {
        return $this->connector->send(new RejectAccount($account));
    }
}
