<?php

namespace App\Http\Integrations\Stripe\Requests\CreditNotes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrievee a credit note's preview items
 */
class RetrieveeCreditNotePreviewItems extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/credit_notes/preview/lines';
    }

    /**
     * @param  null|string  $amount The integer amount in cents (or local equivalent) representing the total amount of the credit note.
     * @param  null|string  $creditAmount The integer amount in cents (or local equivalent) representing the amount to credit the customer's balance, which will be automatically applied to their next invoice.
     * @param  null|string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $invoice (Required) ID of the invoice.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $lines0type Line items that make up the credit note.
     * @param  null|string  $lines0amount Line items that make up the credit note.
     * @param  null|string  $lines0description Line items that make up the credit note.
     * @param  null|string  $lines0invoiceLineItem Line items that make up the credit note.
     * @param  null|string  $lines0quantity Line items that make up the credit note.
     * @param  null|string  $lines0taxRates0 Line items that make up the credit note.
     * @param  null|string  $lines0taxRates1 Line items that make up the credit note.
     * @param  null|string  $lines0unitAmount Line items that make up the credit note.
     * @param  null|string  $lines0unitAmountDecimal Line items that make up the credit note.
     * @param  null|string  $lines1type Line items that make up the credit note.
     * @param  null|string  $lines1amount Line items that make up the credit note.
     * @param  null|string  $lines1description Line items that make up the credit note.
     * @param  null|string  $lines1invoiceLineItem Line items that make up the credit note.
     * @param  null|string  $lines1quantity Line items that make up the credit note.
     * @param  null|string  $lines1taxRates0 Line items that make up the credit note.
     * @param  null|string  $lines1taxRates1 Line items that make up the credit note.
     * @param  null|string  $lines1unitAmount Line items that make up the credit note.
     * @param  null|string  $lines1unitAmountDecimal Line items that make up the credit note.
     * @param  null|string  $memo The credit note's memo appears on the credit note PDF.
     * @param  null|string  $outOfBandAmount The integer amount in cents (or local equivalent) representing the amount that is credited outside of Stripe.
     * @param  null|string  $reason Reason for issuing this credit note, one of `duplicate`, `fraudulent`, `order_change`, or `product_unsatisfactory`
     * @param  null|string  $refund ID of an existing refund to link this credit note to.
     * @param  null|string  $refundAmount The integer amount in cents (or local equivalent) representing the amount to refund. If set, a refund will be created for the charge associated with the invoice.
     * @param  null|string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function __construct(
        protected ?string $amount = null,
        protected ?string $creditAmount = null,
        protected ?string $endingBefore = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $invoice = null,
        protected ?string $limit = null,
        protected ?string $lines0type = null,
        protected ?string $lines0amount = null,
        protected ?string $lines0description = null,
        protected ?string $lines0invoiceLineItem = null,
        protected ?string $lines0quantity = null,
        protected ?string $lines0taxRates0 = null,
        protected ?string $lines0taxRates1 = null,
        protected ?string $lines0unitAmount = null,
        protected ?string $lines0unitAmountDecimal = null,
        protected ?string $lines1type = null,
        protected ?string $lines1amount = null,
        protected ?string $lines1description = null,
        protected ?string $lines1invoiceLineItem = null,
        protected ?string $lines1quantity = null,
        protected ?string $lines1taxRates0 = null,
        protected ?string $lines1taxRates1 = null,
        protected ?string $lines1unitAmount = null,
        protected ?string $lines1unitAmountDecimal = null,
        protected ?string $memo = null,
        protected ?string $outOfBandAmount = null,
        protected ?string $reason = null,
        protected ?string $refund = null,
        protected ?string $refundAmount = null,
        protected ?string $startingAfter = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'amount' => $this->amount,
            'credit_amount' => $this->creditAmount,
            'ending_before' => $this->endingBefore,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'invoice' => $this->invoice,
            'limit' => $this->limit,
            'lines[0][type]' => $this->lines0type,
            'lines[0][amount]' => $this->lines0amount,
            'lines[0][description]' => $this->lines0description,
            'lines[0][invoice_line_item]' => $this->lines0invoiceLineItem,
            'lines[0][quantity]' => $this->lines0quantity,
            'lines[0][tax_rates][0]' => $this->lines0taxRates0,
            'lines[0][tax_rates][1]' => $this->lines0taxRates1,
            'lines[0][unit_amount]' => $this->lines0unitAmount,
            'lines[0][unit_amount_decimal]' => $this->lines0unitAmountDecimal,
            'lines[1][type]' => $this->lines1type,
            'lines[1][amount]' => $this->lines1amount,
            'lines[1][description]' => $this->lines1description,
            'lines[1][invoice_line_item]' => $this->lines1invoiceLineItem,
            'lines[1][quantity]' => $this->lines1quantity,
            'lines[1][tax_rates][0]' => $this->lines1taxRates0,
            'lines[1][tax_rates][1]' => $this->lines1taxRates1,
            'lines[1][unit_amount]' => $this->lines1unitAmount,
            'lines[1][unit_amount_decimal]' => $this->lines1unitAmountDecimal,
            'memo' => $this->memo,
            'out_of_band_amount' => $this->outOfBandAmount,
            'reason' => $this->reason,
            'refund' => $this->refund,
            'refund_amount' => $this->refundAmount,
            'starting_after' => $this->startingAfter,
        ]);
    }
}
