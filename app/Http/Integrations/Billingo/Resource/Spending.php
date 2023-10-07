<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Spending\SpendingDelete;
use App\Http\Integrations\Billingo\Requests\Spending\SpendingList;
use App\Http\Integrations\Billingo\Requests\Spending\SpendingSave;
use App\Http\Integrations\Billingo\Requests\Spending\SpendingShow;
use App\Http\Integrations\Billingo\Requests\Spending\SpendingUpdate;
use App\Http\Integrations\Billingo\Resource;
use Saloon\Http\Response;

class Spending extends Resource
{
    public function spendingList(
        ?string $q,
        ?int $page,
        ?string $spendingDate,
        ?string $startDate,
        ?string $endDate,
        ?string $paymentStatus,
        ?string $spendingType,
        ?string $categories,
        ?string $currencies,
        ?string $paymentMethods,
    ): Response {
        return $this->connector->send(new SpendingList($q, $page, $spendingDate, $startDate, $endDate, $paymentStatus, $spendingType, $categories, $currencies, $paymentMethods));
    }

    public function spendingSave(): Response
    {
        return $this->connector->send(new SpendingSave());
    }

    public function spendingShow(int $id): Response
    {
        return $this->connector->send(new SpendingShow($id));
    }

    public function spendingUpdate(int $id): Response
    {
        return $this->connector->send(new SpendingUpdate($id));
    }

    public function spendingDelete(int $id): Response
    {
        return $this->connector->send(new SpendingDelete($id));
    }
}
