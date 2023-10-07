<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\CreditNotes\CreateCreditNote;
use App\Http\Integrations\Stripe\Requests\CreditNotes\ListAllCreditNotes;
use App\Http\Integrations\Stripe\Requests\CreditNotes\PreviewCreditNote;
use App\Http\Integrations\Stripe\Requests\CreditNotes\RetrieveCreditNote;
use App\Http\Integrations\Stripe\Requests\CreditNotes\RetrieveCreditNoteLineItems;
use App\Http\Integrations\Stripe\Requests\CreditNotes\RetrieveeCreditNotePreviewItems;
use App\Http\Integrations\Stripe\Requests\CreditNotes\UpdateCreditNote;
use App\Http\Integrations\Stripe\Requests\CreditNotes\VoidCreditNote;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class CreditNotes extends Resource
{
	/**
	 * @param string $customer Only return credit notes for the customer specified by this customer ID.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $invoice Only return credit notes for the invoice specified by this invoice ID.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function listAllCreditNotes(
		?string $customer,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $invoice,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new ListAllCreditNotes($customer, $endingBefore, $expand0, $expand1, $invoice, $limit, $startingAfter));
	}


	public function createCreditNote(): Response
	{
		return $this->connector->send(new CreateCreditNote());
	}


	/**
	 * @param string $amount The integer amount in cents (or local equivalent) representing the total amount of the credit note.
	 * @param string $creditAmount The integer amount in cents (or local equivalent) representing the amount to credit the customer's balance, which will be automatically applied to their next invoice.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $invoice (Required) ID of the invoice.
	 * @param string $lines0type Line items that make up the credit note.
	 * @param string $lines0amount Line items that make up the credit note.
	 * @param string $lines0description Line items that make up the credit note.
	 * @param string $lines0invoiceLineItem Line items that make up the credit note.
	 * @param string $lines0quantity Line items that make up the credit note.
	 * @param string $lines0taxRates0 Line items that make up the credit note.
	 * @param string $lines0taxRates1 Line items that make up the credit note.
	 * @param string $lines0unitAmount Line items that make up the credit note.
	 * @param string $lines0unitAmountDecimal Line items that make up the credit note.
	 * @param string $lines1type Line items that make up the credit note.
	 * @param string $lines1amount Line items that make up the credit note.
	 * @param string $lines1description Line items that make up the credit note.
	 * @param string $lines1invoiceLineItem Line items that make up the credit note.
	 * @param string $lines1quantity Line items that make up the credit note.
	 * @param string $lines1taxRates0 Line items that make up the credit note.
	 * @param string $lines1taxRates1 Line items that make up the credit note.
	 * @param string $lines1unitAmount Line items that make up the credit note.
	 * @param string $lines1unitAmountDecimal Line items that make up the credit note.
	 * @param string $memo The credit note's memo appears on the credit note PDF.
	 * @param string $outOfBandAmount The integer amount in cents (or local equivalent) representing the amount that is credited outside of Stripe.
	 * @param string $reason Reason for issuing this credit note, one of `duplicate`, `fraudulent`, `order_change`, or `product_unsatisfactory`
	 * @param string $refund ID of an existing refund to link this credit note to.
	 * @param string $refundAmount The integer amount in cents (or local equivalent) representing the amount to refund. If set, a refund will be created for the charge associated with the invoice.
	 */
	public function previewCreditNote(
		?string $amount,
		?string $creditAmount,
		?string $expand0,
		?string $expand1,
		?string $invoice,
		?string $lines0type,
		?string $lines0amount,
		?string $lines0description,
		?string $lines0invoiceLineItem,
		?string $lines0quantity,
		?string $lines0taxRates0,
		?string $lines0taxRates1,
		?string $lines0unitAmount,
		?string $lines0unitAmountDecimal,
		?string $lines1type,
		?string $lines1amount,
		?string $lines1description,
		?string $lines1invoiceLineItem,
		?string $lines1quantity,
		?string $lines1taxRates0,
		?string $lines1taxRates1,
		?string $lines1unitAmount,
		?string $lines1unitAmountDecimal,
		?string $memo,
		?string $outOfBandAmount,
		?string $reason,
		?string $refund,
		?string $refundAmount,
	): Response
	{
		return $this->connector->send(new PreviewCreditNote($amount, $creditAmount, $expand0, $expand1, $invoice, $lines0type, $lines0amount, $lines0description, $lines0invoiceLineItem, $lines0quantity, $lines0taxRates0, $lines0taxRates1, $lines0unitAmount, $lines0unitAmountDecimal, $lines1type, $lines1amount, $lines1description, $lines1invoiceLineItem, $lines1quantity, $lines1taxRates0, $lines1taxRates1, $lines1unitAmount, $lines1unitAmountDecimal, $memo, $outOfBandAmount, $reason, $refund, $refundAmount));
	}


	/**
	 * @param string $amount The integer amount in cents (or local equivalent) representing the total amount of the credit note.
	 * @param string $creditAmount The integer amount in cents (or local equivalent) representing the amount to credit the customer's balance, which will be automatically applied to their next invoice.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $invoice (Required) ID of the invoice.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $lines0type Line items that make up the credit note.
	 * @param string $lines0amount Line items that make up the credit note.
	 * @param string $lines0description Line items that make up the credit note.
	 * @param string $lines0invoiceLineItem Line items that make up the credit note.
	 * @param string $lines0quantity Line items that make up the credit note.
	 * @param string $lines0taxRates0 Line items that make up the credit note.
	 * @param string $lines0taxRates1 Line items that make up the credit note.
	 * @param string $lines0unitAmount Line items that make up the credit note.
	 * @param string $lines0unitAmountDecimal Line items that make up the credit note.
	 * @param string $lines1type Line items that make up the credit note.
	 * @param string $lines1amount Line items that make up the credit note.
	 * @param string $lines1description Line items that make up the credit note.
	 * @param string $lines1invoiceLineItem Line items that make up the credit note.
	 * @param string $lines1quantity Line items that make up the credit note.
	 * @param string $lines1taxRates0 Line items that make up the credit note.
	 * @param string $lines1taxRates1 Line items that make up the credit note.
	 * @param string $lines1unitAmount Line items that make up the credit note.
	 * @param string $lines1unitAmountDecimal Line items that make up the credit note.
	 * @param string $memo The credit note's memo appears on the credit note PDF.
	 * @param string $outOfBandAmount The integer amount in cents (or local equivalent) representing the amount that is credited outside of Stripe.
	 * @param string $reason Reason for issuing this credit note, one of `duplicate`, `fraudulent`, `order_change`, or `product_unsatisfactory`
	 * @param string $refund ID of an existing refund to link this credit note to.
	 * @param string $refundAmount The integer amount in cents (or local equivalent) representing the amount to refund. If set, a refund will be created for the charge associated with the invoice.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function retrieveeCreditNotePreviewItems(
		?string $amount,
		?string $creditAmount,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $invoice,
		?string $limit,
		?string $lines0type,
		?string $lines0amount,
		?string $lines0description,
		?string $lines0invoiceLineItem,
		?string $lines0quantity,
		?string $lines0taxRates0,
		?string $lines0taxRates1,
		?string $lines0unitAmount,
		?string $lines0unitAmountDecimal,
		?string $lines1type,
		?string $lines1amount,
		?string $lines1description,
		?string $lines1invoiceLineItem,
		?string $lines1quantity,
		?string $lines1taxRates0,
		?string $lines1taxRates1,
		?string $lines1unitAmount,
		?string $lines1unitAmountDecimal,
		?string $memo,
		?string $outOfBandAmount,
		?string $reason,
		?string $refund,
		?string $refundAmount,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new RetrieveeCreditNotePreviewItems($amount, $creditAmount, $endingBefore, $expand0, $expand1, $invoice, $limit, $lines0type, $lines0amount, $lines0description, $lines0invoiceLineItem, $lines0quantity, $lines0taxRates0, $lines0taxRates1, $lines0unitAmount, $lines0unitAmountDecimal, $lines1type, $lines1amount, $lines1description, $lines1invoiceLineItem, $lines1quantity, $lines1taxRates0, $lines1taxRates1, $lines1unitAmount, $lines1unitAmountDecimal, $memo, $outOfBandAmount, $reason, $refund, $refundAmount, $startingAfter));
	}


	/**
	 * @param string $creditNote
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function retrieveCreditNoteLineItems(
		string $creditNote,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new RetrieveCreditNoteLineItems($creditNote, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	/**
	 * @param string $id
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveCreditNote(string $id, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveCreditNote($id, $expand0, $expand1));
	}


	/**
	 * @param string $id
	 */
	public function updateCreditNote(string $id): Response
	{
		return $this->connector->send(new UpdateCreditNote($id));
	}


	/**
	 * @param string $id
	 */
	public function voidCreditNote(string $id): Response
	{
		return $this->connector->send(new VoidCreditNote($id));
	}
}
