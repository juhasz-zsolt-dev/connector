<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Disputes\AcceptClaim;
use App\Http\Integrations\PayPal\Requests\Disputes\AcceptOfferToResolveDispute;
use App\Http\Integrations\PayPal\Requests\Disputes\AcknowledgeReturnedItem;
use App\Http\Integrations\PayPal\Requests\Disputes\AppealDispute;
use App\Http\Integrations\PayPal\Requests\Disputes\DenyOfferToResolveDispute;
use App\Http\Integrations\PayPal\Requests\Disputes\EscalateDisputeToClaim;
use App\Http\Integrations\PayPal\Requests\Disputes\ListDisputes;
use App\Http\Integrations\PayPal\Requests\Disputes\MakeOfferToResolveDispute;
use App\Http\Integrations\PayPal\Requests\Disputes\PartiallyUpdateDispute;
use App\Http\Integrations\PayPal\Requests\Disputes\ProvideEvidence;
use App\Http\Integrations\PayPal\Requests\Disputes\ProvideSupportingInformationForDispute;
use App\Http\Integrations\PayPal\Requests\Disputes\SendMessageAboutDisputeToOtherParty;
use App\Http\Integrations\PayPal\Requests\Disputes\SettleDispute;
use App\Http\Integrations\PayPal\Requests\Disputes\ShowDisputeDetails;
use App\Http\Integrations\PayPal\Requests\Disputes\UpdateDisputeStatus;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Disputes extends Resource
{
	/**
	 * @param string $startTime Filters the disputes in the response by a creation date and time. The start time must be within the last 180 days. Value is in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example, *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`.<br/><br/>You can specify either but not both the `start_time` and `disputed_transaction_id` query parameters.
	 * @param string $disputedTransactionId Filters the disputes in the response by a transaction, by ID.<br/><br/>You can specify either but not both the `start_time` and `disputed_transaction_id` query parameter.
	 * @param string $pageSize Limits the number of disputes in the response to this value.
	 * @param string $nextPageToken The token that describes the next page of results to fetch. The <a href="https://developer.paypal.com/api/customer-disputes/v1/#disputes_list">list disputes</a> call returns this token in the HATEOAS links in the response.
	 * @param string $disputeState Filters the disputes in the response by a state. Separate multiple values with a comma (`,`). When you specify more than one dispute_state, the response lists disputes that belong to any of the specified dispute_state.
	 * @param string $updateTimeBefore The date and time when the dispute was last updated, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example, *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`. update_time_before must be within the last 180 days and the default is the current time.
	 * @param string $updateTimeAfter The date and time when the dispute was last updated, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). For example, *`yyyy`*-*`MM`*-*`dd`*`T`*`HH`*:*`mm`*:*`ss`*.*`SSS`*`Z`. update_time_after must be within the last 180 days and the default is the maximum time (180 days) supported.
	 */
	public function listDisputes(
		?string $startTime,
		?string $disputedTransactionId,
		?string $pageSize,
		?string $nextPageToken,
		?string $disputeState,
		?string $updateTimeBefore,
		?string $updateTimeAfter,
	): Response
	{
		return $this->connector->send(new ListDisputes($startTime, $disputedTransactionId, $pageSize, $nextPageToken, $disputeState, $updateTimeBefore, $updateTimeAfter));
	}


	/**
	 * @param string $disputeId
	 */
	public function showDisputeDetails(string $disputeId): Response
	{
		return $this->connector->send(new ShowDisputeDetails($disputeId));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $note
	 * @param mixed $acceptClaimReason
	 * @param mixed $acceptClaimType
	 */
	public function acceptClaim(
		string $disputeId,
		mixed $note,
		mixed $acceptClaimReason,
		mixed $acceptClaimType,
	): Response
	{
		return $this->connector->send(new AcceptClaim($disputeId, $note, $acceptClaimReason, $acceptClaimType));
	}


	/**
	 * @param string $disputeId
	 */
	public function appealDispute(string $disputeId): Response
	{
		return $this->connector->send(new AppealDispute($disputeId));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $adjudicationOutcome
	 */
	public function settleDispute(string $disputeId, mixed $adjudicationOutcome): Response
	{
		return $this->connector->send(new SettleDispute($disputeId, $adjudicationOutcome));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $action
	 */
	public function updateDisputeStatus(string $disputeId, mixed $action): Response
	{
		return $this->connector->send(new UpdateDisputeStatus($disputeId, $action));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $note
	 * @param mixed $offerAmount
	 * @param mixed $offerType
	 */
	public function makeOfferToResolveDispute(
		string $disputeId,
		mixed $note,
		mixed $offerAmount,
		mixed $offerType,
	): Response
	{
		return $this->connector->send(new MakeOfferToResolveDispute($disputeId, $note, $offerAmount, $offerType));
	}


	/**
	 * @param string $disputeId
	 */
	public function provideEvidence(string $disputeId): Response
	{
		return $this->connector->send(new ProvideEvidence($disputeId));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $note
	 * @param mixed $acknowledgementType
	 */
	public function acknowledgeReturnedItem(string $disputeId, mixed $note, mixed $acknowledgementType): Response
	{
		return $this->connector->send(new AcknowledgeReturnedItem($disputeId, $note, $acknowledgementType));
	}


	/**
	 * @param string $disputeId
	 */
	public function provideSupportingInformationForDispute(string $disputeId): Response
	{
		return $this->connector->send(new ProvideSupportingInformationForDispute($disputeId));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $note
	 */
	public function escalateDisputeToClaim(string $disputeId, mixed $note): Response
	{
		return $this->connector->send(new EscalateDisputeToClaim($disputeId, $note));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $note
	 */
	public function acceptOfferToResolveDispute(string $disputeId, mixed $note): Response
	{
		return $this->connector->send(new AcceptOfferToResolveDispute($disputeId, $note));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $message
	 */
	public function sendMessageAboutDisputeToOtherParty(string $disputeId, mixed $message): Response
	{
		return $this->connector->send(new SendMessageAboutDisputeToOtherParty($disputeId, $message));
	}


	/**
	 * @param string $disputeId
	 * @param mixed $note
	 */
	public function denyOfferToResolveDispute(string $disputeId, mixed $note): Response
	{
		return $this->connector->send(new DenyOfferToResolveDispute($disputeId, $note));
	}


	/**
	 * @param string $disputeId
	 * @param array $values
	 */
	public function partiallyUpdateDispute(string $disputeId, ?array $values): Response
	{
		return $this->connector->send(new PartiallyUpdateDispute($disputeId, $values));
	}
}
