<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Plans\ActivatePlan;
use App\Http\Integrations\PayPal\Requests\Plans\CreatePlan;
use App\Http\Integrations\PayPal\Requests\Plans\DeactivatePlan;
use App\Http\Integrations\PayPal\Requests\Plans\ListPlans;
use App\Http\Integrations\PayPal\Requests\Plans\ShowPlanDetails;
use App\Http\Integrations\PayPal\Requests\Plans\UpdatePlan;
use App\Http\Integrations\PayPal\Requests\Plans\UpdatePricing;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Plans extends Resource
{
	/**
	 * @param mixed $productId
	 * @param mixed $name
	 * @param mixed $description
	 * @param mixed $status
	 * @param mixed $billingCycles
	 * @param mixed $paymentPreferences
	 * @param mixed $taxes
	 */
	public function createPlan(
		mixed $productId,
		mixed $name,
		mixed $description,
		mixed $status,
		mixed $billingCycles,
		mixed $paymentPreferences,
		mixed $taxes,
	): Response
	{
		return $this->connector->send(new CreatePlan($productId, $name, $description, $status, $billingCycles, $paymentPreferences, $taxes));
	}


	/**
	 * @param string $productId Filters the response by a Product ID.
	 * @param string $planIds Filters the response by list of plan IDs. Filter supports upto 10 plan IDs.
	 * @param string $pageSize The number of items to return in the response.
	 * @param string $page A non-zero integer which is the start index of the entire list of items to return in the response. The combination of `page=1` and `page_size=20` returns the first 20 items. The combination of `page=2` and `page_size=20` returns the next 20 items.
	 * @param string $totalRequired Indicates whether to show the total count in the response.
	 */
	public function listPlans(
		?string $productId,
		?string $planIds,
		?string $pageSize,
		?string $page,
		?string $totalRequired,
	): Response
	{
		return $this->connector->send(new ListPlans($productId, $planIds, $pageSize, $page, $totalRequired));
	}


	/**
	 * @param string $billingPlanId
	 */
	public function showPlanDetails(string $billingPlanId): Response
	{
		return $this->connector->send(new ShowPlanDetails($billingPlanId));
	}


	/**
	 * @param string $billingPlanId
	 * @param array $values
	 */
	public function updatePlan(string $billingPlanId, ?array $values): Response
	{
		return $this->connector->send(new UpdatePlan($billingPlanId, $values));
	}


	/**
	 * @param string $billingPlanId
	 */
	public function deactivatePlan(string $billingPlanId): Response
	{
		return $this->connector->send(new DeactivatePlan($billingPlanId));
	}


	/**
	 * @param string $billingPlanId
	 */
	public function activatePlan(string $billingPlanId): Response
	{
		return $this->connector->send(new ActivatePlan($billingPlanId));
	}


	/**
	 * @param string $billingPlanId
	 * @param mixed $pricingSchemes
	 */
	public function updatePricing(string $billingPlanId, mixed $pricingSchemes): Response
	{
		return $this->connector->send(new UpdatePricing($billingPlanId, $pricingSchemes));
	}
}
