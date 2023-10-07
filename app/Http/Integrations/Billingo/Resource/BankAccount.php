<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\BankAccount\CreateBankAccount;
use App\Http\Integrations\Billingo\Requests\BankAccount\DeleteBankAccount;
use App\Http\Integrations\Billingo\Requests\BankAccount\GetBankAccount;
use App\Http\Integrations\Billingo\Requests\BankAccount\ListBankAccount;
use App\Http\Integrations\Billingo\Requests\BankAccount\UpdateBankAccount;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class BankAccount extends Resource
{
    public function listBankAccount(?int $page): Response
    {
        return $this->connector->send(new ListBankAccount($page));
    }

    public function createBankAccount(): Response
    {
        return $this->connector->send(new CreateBankAccount());
    }

    public function getBankAccount(int $id): Response
    {
        return $this->connector->send(new GetBankAccount($id));
    }

    public function updateBankAccount(int $id): Response
    {
        return $this->connector->send(new UpdateBankAccount($id));
    }

    public function deleteBankAccount(int $id): Response
    {
        return $this->connector->send(new DeleteBankAccount($id));
    }
}
