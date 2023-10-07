<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Resource\BankAccount;
use App\Persistence\Services\ApiKeyResolver;
use Illuminate\Http\Request;
use Saloon\Contracts\Connector;
use Saloon\Http\Response;

class BankAccountController extends Controller
{
    private Connector $connector;

    private BankAccount $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new BankAccount($this->connector);
    }

    public function createBankAccount()
    {
        return $this->resource->createBankAccount();
    }

    public function getBankAccount(Request $request)
    {
        return $this->resource->getBankAccount($request->route('id'));
    }

    public function deleteBankAccount(Request $request): Response
    {
        return $this->resource->deleteBankAccount($request->route('id'));
    }

    public function listBankAccount(Request $request): Response
    {
        return $this->resource->listBankAccount($request->get('page'));
    }

    public function updateBankAccount(Request $request): Response
    {
        return $this->resource->updateBankAccount($request->route('id'));
    }
}
