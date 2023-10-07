<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Document\ArchiveDocument;
use App\Http\Integrations\Billingo\Requests\Document\CancelDocument;
use App\Http\Integrations\Billingo\Requests\Document\CreateDocument;
use App\Http\Integrations\Billingo\Requests\Document\CreateDocumentFromDraft;
use App\Http\Integrations\Billingo\Requests\Document\CreateDocumentFromProforma;
use App\Http\Integrations\Billingo\Requests\Document\CreateModificationDocument;
use App\Http\Integrations\Billingo\Requests\Document\CreateReceipt;
use App\Http\Integrations\Billingo\Requests\Document\CreateReceiptFromDraft;
use App\Http\Integrations\Billingo\Requests\Document\DeleteDocument;
use App\Http\Integrations\Billingo\Requests\Document\DeletePayment;
use App\Http\Integrations\Billingo\Requests\Document\DocumentCopy;
use App\Http\Integrations\Billingo\Requests\Document\DownloadDocument;
use App\Http\Integrations\Billingo\Requests\Document\GetDocument;
use App\Http\Integrations\Billingo\Requests\Document\GetDocumentByVendorId;
use App\Http\Integrations\Billingo\Requests\Document\GetOnlineSzamlaStatus;
use App\Http\Integrations\Billingo\Requests\Document\GetPayment;
use App\Http\Integrations\Billingo\Requests\Document\GetPublicUrl;
use App\Http\Integrations\Billingo\Requests\Document\ListDocument;
use App\Http\Integrations\Billingo\Requests\Document\PosPrint;
use App\Http\Integrations\Billingo\Requests\Document\SendDocument;
use App\Http\Integrations\Billingo\Requests\Document\UpdatePayment;
use App\Http\Integrations\Billingo\Resource;
use ReflectionException;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Http\Response;

class Document extends Resource
{
    /**
     * @param int|null $page
     * @param int|null $blockId Filter documents by the identifier of your DocumentBlock.
     * @param int|null $partnerId Filter documents by the identifier of your Partner.
     * @param string|null $paymentMethod Filter documents by PaymentMethod value.
     * @param string|null $paymentStatus Filter documents by PaymentStatus value.
     * @param string|null $startDate Filter documents by their invoice date.
     * @param string|null $endDate Filter documents by their invoice date.
     * @param int|null $startNumber Starting number of the document, should not contain year or any other formatting. Required if `start_year` given
     * @param int|null $endNumber Ending number of the document, should not contain year or any other formatting. Required if `end_year` given
     * @param int|null $startYear Year for `start_number` parameter. Required if `start_number` given.
     * @param int|null $endYear Year for `end_number` parameter. Required if `end_number` given.
     * @param string|null $type Filter documents by type
     * @param string|null $query Filter documents by the given text
     * @param string|null $paidStartDate Filter documents by their payment date.
     * @param string|null $paidEndDate Filter documents by their payment date.
     * @param string|null $fulfillmentStartDate Filter documents by their fulfillment date.
     * @param string|null $fulfillmentEndDate Filter documents by their fulfillment date.
     * @param string|null $lastModifiedDate Filter documents by their last modified date.
     * @return Response
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function listDocument(
        ?int $page,
        ?int $blockId,
        ?int $partnerId,
        ?string $paymentMethod,
        ?string $paymentStatus,
        ?string $startDate,
        ?string $endDate,
        ?int $startNumber,
        ?int $endNumber,
        ?int $startYear,
        ?int $endYear,
        ?string $type,
        ?string $query,
        ?string $paidStartDate,
        ?string $paidEndDate,
        ?string $fulfillmentStartDate,
        ?string $fulfillmentEndDate,
        ?string $lastModifiedDate,
    ): Response {
        return $this->connector->send(new ListDocument($page, $blockId, $partnerId, $paymentMethod, $paymentStatus, $startDate, $endDate, $startNumber, $endNumber, $startYear, $endYear, $type, $query, $paidStartDate, $paidEndDate, $fulfillmentStartDate, $fulfillmentEndDate, $lastModifiedDate));
    }

    public function createDocument(): Response
    {
        return $this->connector->send(new CreateDocument());
    }

    public function createReceipt(): Response
    {
        return $this->connector->send(new CreateReceipt());
    }

    public function createReceiptFromDraft(int $id): Response
    {
        return $this->connector->send(new CreateReceiptFromDraft($id));
    }

    public function getDocumentByVendorId(string $vendorId): Response
    {
        return $this->connector->send(new GetDocumentByVendorId($vendorId));
    }

    public function getDocument(int $id): Response
    {
        return $this->connector->send(new GetDocument($id));
    }

    public function createDocumentFromDraft(int $id): Response
    {
        return $this->connector->send(new CreateDocumentFromDraft($id));
    }

    public function deleteDocument(int $id): Response
    {
        return $this->connector->send(new DeleteDocument($id));
    }

    public function archiveDocument(int $id): Response
    {
        return $this->connector->send(new ArchiveDocument($id));
    }

    public function cancelDocument(int $id): Response
    {
        return $this->connector->send(new CancelDocument($id));
    }

    public function documentCopy(int $id): Response
    {
        return $this->connector->send(new DocumentCopy($id));
    }

    public function createDocumentFromProforma(int $id): Response
    {
        return $this->connector->send(new CreateDocumentFromProforma($id));
    }

    public function createModificationDocument(int $id): Response
    {
        return $this->connector->send(new CreateModificationDocument($id));
    }

    public function downloadDocument(int $id): Response
    {
        return $this->connector->send(new DownloadDocument($id));
    }

    public function getOnlineSzamlaStatus(int $id): Response
    {
        return $this->connector->send(new GetOnlineSzamlaStatus($id));
    }

    public function getPayment(int $id): Response
    {
        return $this->connector->send(new GetPayment($id));
    }

    public function updatePayment(int $id): Response
    {
        return $this->connector->send(new UpdatePayment($id));
    }

    public function deletePayment(int $id): Response
    {
        return $this->connector->send(new DeletePayment($id));
    }

    /**
     * @param  float|int  $size In which size the POS PDF should be rendered.
     */
    public function posPrint(int $id, float|int $size): Response
    {
        return $this->connector->send(new PosPrint($id, $size));
    }

    public function getPublicUrl(int $id): Response
    {
        return $this->connector->send(new GetPublicUrl($id));
    }

    public function sendDocument(int $id): Response
    {
        return $this->connector->send(new SendDocument($id));
    }
}
