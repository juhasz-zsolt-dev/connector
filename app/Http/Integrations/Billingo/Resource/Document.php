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
     * @param  int|null  $blockId Filter documents by the identifier of your DocumentBlock.
     * @param  int|null  $partnerId Filter documents by the identifier of your Partner.
     * @param  string|null  $paymentMethod Filter documents by PaymentMethod value.
     * @param  string|null  $paymentStatus Filter documents by PaymentStatus value.
     * @param  string|null  $startDate Filter documents by their invoice date.
     * @param  string|null  $endDate Filter documents by their invoice date.
     * @param  int|null  $startNumber Starting number of the document, should not contain year or any other formatting. Required if `start_year` given
     * @param  int|null  $endNumber Ending number of the document, should not contain year or any other formatting. Required if `end_year` given
     * @param  int|null  $startYear Year for `start_number` parameter. Required if `start_number` given.
     * @param  int|null  $endYear Year for `end_number` parameter. Required if `end_number` given.
     * @param  string|null  $type Filter documents by type
     * @param  string|null  $paidStartDate Filter documents by their payment date.
     * @param  string|null  $paidEndDate Filter documents by their payment date.
     * @param  string|null  $fulfillmentStartDate Filter documents by their fulfillment date.
     * @param  string|null  $fulfillmentEndDate Filter documents by their fulfillment date.
     * @param  string|null  $lastModifiedDate Filter documents by their last modified date.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function listDocument(
        ?int $page,
        ?int $perPage,
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
        ?string $documentQuery,
        ?string $paidStartDate,
        ?string $paidEndDate,
        ?string $fulfillmentStartDate,
        ?string $fulfillmentEndDate,
        ?string $lastModifiedDate,
    ): Response {
        return $this->connector->send(request: new ListDocument(
            $page,
            perPage: $perPage,
            blockId: $blockId,
            partnerId: $partnerId,
            paymentMethod: $paymentMethod,
            paymentStatus: $paymentStatus,
            startDate: $startDate,
            endDate: $endDate,
            startNumber: $startNumber,
            endNumber: $endNumber,
            startYear: $startYear,
            endYear: $endYear,
            type: $type,
            documentQuery: $documentQuery,
            paidStartDate: $paidStartDate,
            paidEndDate: $paidEndDate,
            fulfillmentStartDate: $fulfillmentStartDate,
            fulfillmentEndDate: $fulfillmentEndDate,
            lastModifiedDate: $lastModifiedDate
        ));
    }

    public function createDocument(): Response
    {
        return $this->connector->send(request: new CreateDocument());
    }

    public function createReceipt(): Response
    {
        return $this->connector->send(request: new CreateReceipt());
    }

    public function createReceiptFromDraft(int $id): Response
    {
        return $this->connector->send(request: new CreateReceiptFromDraft(id: $id));
    }

    public function getDocumentByVendorId(string $vendorId): Response
    {
        return $this->connector->send(request: new GetDocumentByVendorId(vendorId: $vendorId));
    }

    public function getDocument(int $id): Response
    {
        return $this->connector->send(request: new GetDocument(id: $id));
    }

    public function createDocumentFromDraft(int $id): Response
    {
        return $this->connector->send(request: new CreateDocumentFromDraft(id: $id));
    }

    public function deleteDocument(int $id): Response
    {
        return $this->connector->send(request: new DeleteDocument(id: $id));
    }

    public function archiveDocument(int $id): Response
    {
        return $this->connector->send(request: new ArchiveDocument(id: $id));
    }

    public function cancelDocument(int $id): Response
    {
        return $this->connector->send(request: new CancelDocument(id: $id));
    }

    public function documentCopy(int $id): Response
    {
        return $this->connector->send(request: new DocumentCopy(id: $id));
    }

    public function createDocumentFromProforma(int $id): Response
    {
        return $this->connector->send(request: new CreateDocumentFromProforma(id: $id));
    }

    public function createModificationDocument(int $id): Response
    {
        return $this->connector->send(request: new CreateModificationDocument(id: $id));
    }

    public function downloadDocument(int $id): Response
    {
        return $this->connector->send(request: new DownloadDocument(id: $id));
    }

    public function getOnlineSzamlaStatus(int $id): Response
    {
        return $this->connector->send(request: new GetOnlineSzamlaStatus(id: $id));
    }

    public function getPayment(int $id): Response
    {
        return $this->connector->send(request: new GetPayment(id: $id));
    }

    public function updatePayment(int $id): Response
    {
        return $this->connector->send(request: new UpdatePayment(id: $id));
    }

    public function deletePayment(int $id): Response
    {
        return $this->connector->send(request: new DeletePayment(id: $id));
    }

    /**
     * @param  float|int  $size In which size the POS PDF should be rendered.
     */
    public function posPrint(int $id, float|int $size): Response
    {
        return $this->connector->send(request: new PosPrint(id: $id, size: $size));
    }

    public function getPublicUrl(int $id): Response
    {
        return $this->connector->send(request: new GetPublicUrl(id: $id));
    }

    public function sendDocument(int $id): Response
    {
        return $this->connector->send(request: new SendDocument(id: $id));
    }
}
