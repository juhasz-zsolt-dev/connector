<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Subscriptions\ActivateSubscription;
use App\Http\Integrations\PayPal\Requests\Subscriptions\CancelSubscription;
use App\Http\Integrations\PayPal\Requests\Subscriptions\CaptureAuthorizedPaymentOnSubscription;
use App\Http\Integrations\PayPal\Requests\Subscriptions\CreateSubscription;
use App\Http\Integrations\PayPal\Requests\Subscriptions\ListTransactionsForSubscription;
use App\Http\Integrations\PayPal\Requests\Subscriptions\RevisePlanOrQuantityOfSubscription;
use App\Http\Integrations\PayPal\Requests\Subscriptions\ShowSubscriptionDetails;
use App\Http\Integrations\PayPal\Requests\Subscriptions\SuspendSubscription;
use App\Http\Integrations\PayPal\Requests\Subscriptions\UpdateSubscription;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Subscriptions extends Resource
{
	/**
	 * @param mixed $planId
	 * @param mixed $startTime
	 * @param mixed $shippingAmount
	 * @param mixed $subscriber
	 * @param mixed $applicationContext
	 */
	public function createSubscription(
		mixed $planId,
		mixed $startTime,
		mixed $shippingAmount,
		mixed $subscriber,
		mixed $applicationContext,
	): Response
	{
		return $this->connector->send(new CreateSubscription($planId, $startTime, $shippingAmount, $subscriber, $applicationContext));
	}


	/**
	 * @param string $subscriptionId
	 * @param string $fields List of fields that are to be returned in the response. Possible value for fields are last_failed_payment and plan.
	 */
	public function showSubscriptionDetails(string $subscriptionId, ?string $fields): Response
	{
		return $this->connector->send(new ShowSubscriptionDetails($subscriptionId, $fields));
	}


	/**
	 * @param string $subscriptionId
	 * @param array $values
	 */
	public function updateSubscription(string $subscriptionId, ?array $values): Response
	{
		return $this->connector->send(new UpdateSubscription($subscriptionId, $values));
	}


	/**
	 * @param string $subscriptionId
	 * @param mixed $planId
	 * @param mixed $shippingAmount
	 * @param mixed $shippingAddress
	 * @param mixed $applicationContext
	 */
	public function revisePlanOrQuantityOfSubscription(
		string $subscriptionId,
		mixed $planId,
		mixed $shippingAmount,
		mixed $shippingAddress,
		mixed $applicationContext,
	): Response
	{
		return $this->connector->send(new RevisePlanOrQuantityOfSubscription($subscriptionId, $planId, $shippingAmount, $shippingAddress, $applicationContext));
	}


	/**
	 * @param string $subscriptionId
	 * @param mixed $reason
	 */
	public function suspendSubscription(string $subscriptionId, mixed $reason): Response
	{
		return $this->connector->send(new SuspendSubscription($subscriptionId, $reason));
	}


	/**
	 * @param string $subscriptionId
	 * @param mixed $reason
	 */
	public function activateSubscription(string $subscriptionId, mixed $reason): Response
	{
		return $this->connector->send(new ActivateSubscription($subscriptionId, $reason));
	}


	/**
	 * @param string $subscriptionId
	 * @param mixed $reason
	 */
	public function cancelSubscription(string $subscriptionId, mixed $reason): Response
	{
		return $this->connector->send(new CancelSubscription($subscriptionId, $reason));
	}


	/**
	 * @param string $subscriptionId
	 * @param mixed $note
	 * @param mixed $captureType
	 * @param mixed $amount
	 */
	public function captureAuthorizedPaymentOnSubscription(
		string $subscriptionId,
		mixed $note,
		mixed $captureType,
		mixed $amount,
	): Response
	{
		return $this->connector->send(new CaptureAuthorizedPaymentOnSubscription($subscriptionId, $note, $captureType, $amount));
	}


	/**
	 * @param string $subscriptionId
	 * @param string $startTime (Required) The start time of the range of transactions to list.
	 * @param string $endTime (Required) The end time of the range of transactions to list.
	 */
	public function listTransactionsForSubscription(
		string $subscriptionId,
		?string $startTime,
		?string $endTime,
	): Response
	{
		return $this->connector->send(new ListTransactionsForSubscription($subscriptionId, $startTime, $endTime));
	}
}
