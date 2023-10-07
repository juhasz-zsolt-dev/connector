<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Invoices\CancelSentInvoice;
use App\Http\Integrations\PayPal\Requests\Invoices\CreateDraftInvoice;
use App\Http\Integrations\PayPal\Requests\Invoices\DeleteExternalPayment;
use App\Http\Integrations\PayPal\Requests\Invoices\DeleteExternalRefund;
use App\Http\Integrations\PayPal\Requests\Invoices\DeleteInvoice;
use App\Http\Integrations\PayPal\Requests\Invoices\FullyUpdateInvoice;
use App\Http\Integrations\PayPal\Requests\Invoices\GenerateInvoiceNumber;
use App\Http\Integrations\PayPal\Requests\Invoices\GenerateQrCode;
use App\Http\Integrations\PayPal\Requests\Invoices\ListInvoices;
use App\Http\Integrations\PayPal\Requests\Invoices\RecordPaymentForInvoice;
use App\Http\Integrations\PayPal\Requests\Invoices\RecordRefundForInvoice;
use App\Http\Integrations\PayPal\Requests\Invoices\SearchForInvoices;
use App\Http\Integrations\PayPal\Requests\Invoices\SendInvoice;
use App\Http\Integrations\PayPal\Requests\Invoices\SendInvoiceReminder;
use App\Http\Integrations\PayPal\Requests\Invoices\ShowInvoiceDetails;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Invoices extends Resource
{
    public function generateInvoiceNumber(): Response
    {
        return $this->connector->send(new GenerateInvoiceNumber());
    }

    public function createDraftInvoice(
        mixed $detail,
        mixed $invoicer,
        mixed $primaryRecipients,
        mixed $items,
        mixed $configuration,
        mixed $amount,
    ): Response {
        return $this->connector->send(new CreateDraftInvoice($detail, $invoicer, $primaryRecipients, $items, $configuration, $amount));
    }

    public function showInvoiceDetails(string $invoiceId): Response
    {
        return $this->connector->send(new ShowInvoiceDetails($invoiceId));
    }

    /**
     * @param  string  $page The page number to be retrieved, for the list of items. So, a combination of `page=1` and `page_size=20` returns the first 20 invoices. A combination of `page=2` and `page_size=20` returns the next 20 invoices.
     * @param  string  $pageSize The maximum number of invoices to return in the response.
     * @param  string  $totalRequired Indicates whether the to show <code>total_pages</code> and <code>total_items</code> in the response.
     * @param  string  $fields A comma-separated list of additional fields to return, if available.
     */
    public function listInvoices(?string $page, ?string $pageSize, ?string $totalRequired, ?string $fields): Response
    {
        return $this->connector->send(new ListInvoices($page, $pageSize, $totalRequired, $fields));
    }

    public function generateQrCode(string $invoiceId, mixed $width, mixed $height, mixed $action): Response
    {
        return $this->connector->send(new GenerateQrCode($invoiceId, $width, $height, $action));
    }

    /**
     * @param  string  $sendToRecipient Indicates whether to send the invoice update notification to the recipient.
     * @param  string  $sendToInvoicer Indicates whether to send the invoice update notification to the merchant.
     */
    public function fullyUpdateInvoice(
        string $invoiceId,
        mixed $id,
        mixed $status,
        mixed $detail,
        mixed $invoicer,
        mixed $primaryRecipients,
        mixed $items,
        mixed $configuration,
        mixed $amount,
        ?string $sendToRecipient,
        ?string $sendToInvoicer,
    ): Response {
        return $this->connector->send(new FullyUpdateInvoice($invoiceId, $id, $status, $detail, $invoicer, $primaryRecipients, $items, $configuration, $amount, $sendToRecipient, $sendToInvoicer));
    }

    public function sendInvoice(
        string $invoiceId,
        mixed $subject,
        mixed $note,
        mixed $sendToRecipient,
        mixed $additionalRecipients,
        mixed $sendToInvoicer,
    ): Response {
        return $this->connector->send(new SendInvoice($invoiceId, $subject, $note, $sendToRecipient, $additionalRecipients, $sendToInvoicer));
    }

    public function sendInvoiceReminder(
        string $invoiceId,
        mixed $subject,
        mixed $note,
        mixed $sendToRecipient,
        mixed $additionalRecipients,
        mixed $sendToInvoicer,
    ): Response {
        return $this->connector->send(new SendInvoiceReminder($invoiceId, $subject, $note, $sendToRecipient, $additionalRecipients, $sendToInvoicer));
    }

    public function cancelSentInvoice(
        string $invoiceId,
        mixed $subject,
        mixed $note,
        mixed $sendToInvoicer,
        mixed $sendToRecipient,
        mixed $additionalRecipients,
    ): Response {
        return $this->connector->send(new CancelSentInvoice($invoiceId, $subject, $note, $sendToInvoicer, $sendToRecipient, $additionalRecipients));
    }

    public function deleteInvoice(string $invoiceId): Response
    {
        return $this->connector->send(new DeleteInvoice($invoiceId));
    }

    /**
     * @param  string  $page The page number to be retrieved, for the list of items. So, a combination of `page=1` and `page_size=20` returns the first 20 invoices. A combination of `page=2` and `page_size=20` returns the next 20 invoices.
     * @param  string  $pageSize The page size for the search results.
     * @param  string  $totalRequired Indicates whether the to show <code>total_pages</code> and <code>total_items</code> in the response.
     */
    public function searchForInvoices(
        mixed $recipientEmail,
        mixed $recipientFirstName,
        mixed $recipientLastName,
        mixed $recipientBusinessName,
        mixed $invoiceNumber,
        mixed $status,
        mixed $reference,
        mixed $currencyCode,
        mixed $memo,
        mixed $totalAmountRange,
        mixed $invoiceDateRange,
        ?string $page,
        ?string $pageSize,
        ?string $totalRequired,
    ): Response {
        return $this->connector->send(new SearchForInvoices($recipientEmail, $recipientFirstName, $recipientLastName, $recipientBusinessName, $invoiceNumber, $status, $reference, $currencyCode, $memo, $totalAmountRange, $invoiceDateRange, $page, $pageSize, $totalRequired));
    }

    public function recordPaymentForInvoice(
        string $invoiceId,
        mixed $method,
        mixed $paymentDate,
        mixed $amount,
        mixed $type,
        mixed $transactionType,
        mixed $note,
        mixed $shippingInfo,
    ): Response {
        return $this->connector->send(new RecordPaymentForInvoice($invoiceId, $method, $paymentDate, $amount, $type, $transactionType, $note, $shippingInfo));
    }

    public function deleteExternalPayment(string $invoiceId, string $transactionId): Response
    {
        return $this->connector->send(new DeleteExternalPayment($invoiceId, $transactionId));
    }

    public function recordRefundForInvoice(string $invoiceId, mixed $method, mixed $refundDate, mixed $amount): Response
    {
        return $this->connector->send(new RecordRefundForInvoice($invoiceId, $method, $refundDate, $amount));
    }

    public function deleteExternalRefund(string $invoiceId, string $transactionId): Response
    {
        return $this->connector->send(new DeleteExternalRefund($invoiceId, $transactionId));
    }
}
