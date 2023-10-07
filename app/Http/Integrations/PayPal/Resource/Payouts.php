<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Payouts\CancelUnclaimedPayoutItem;
use App\Http\Integrations\PayPal\Requests\Payouts\CreateBatchPayout;
use App\Http\Integrations\PayPal\Requests\Payouts\ShowPayoutBatchDetails;
use App\Http\Integrations\PayPal\Requests\Payouts\ShowPayoutItemDetails;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Payouts extends Resource
{
    public function createBatchPayout(mixed $senderBatchHeader, mixed $items): Response
    {
        return $this->connector->send(new CreateBatchPayout($senderBatchHeader, $items));
    }

    /**
     * @param  string  $fields Shows details for only the specified fields.
     * @param  string  $page A non-zero integer representing the page of the results.
     * @param  string  $pageSize The maximum number of results to return at one time. Value is a non-negative, non-zero integer. If the user chooses pagination, the maximum page is `1000`.
     * @param  string  $totalRequired Indicates whether to show the total items and total pages count in the response.
     */
    public function showPayoutBatchDetails(
        string $payoutBatchId,
        ?string $fields,
        ?string $page,
        ?string $pageSize,
        ?string $totalRequired,
    ): Response {
        return $this->connector->send(new ShowPayoutBatchDetails($payoutBatchId, $fields, $page, $pageSize, $totalRequired));
    }

    public function showPayoutItemDetails(string $payoutItemId): Response
    {
        return $this->connector->send(new ShowPayoutItemDetails($payoutItemId));
    }

    public function cancelUnclaimedPayoutItem(string $payoutItemId): Response
    {
        return $this->connector->send(new CancelUnclaimedPayoutItem($payoutItemId));
    }
}
