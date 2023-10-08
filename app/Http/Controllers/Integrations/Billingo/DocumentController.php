<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Requests\Document\CreateDocument;
use App\Http\Integrations\Billingo\Requests\Document\DownloadDocument;
use App\Http\Integrations\Billingo\Requests\Document\GetDocument;
use App\Http\Integrations\Billingo\Resource\Document;
use App\Persistence\Enums\Billingo\Currency;
use App\Persistence\Enums\Billingo\Language;
use App\Persistence\Enums\Billingo\PaymentMethod;
use App\Persistence\Services\ApiKeyResolver;
use Exception;
use Illuminate\Http\Request;
use ReflectionException;
use Saloon\Contracts\Connector;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Helpers\Arr;
use Saloon\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    private Connector $connector;

    private Document $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new Document($this->connector);
    }

    /**
     * Creates a document.
     *
     * @param Request $request The request object containing the data for creating the document.
     * @return Response The JSON response containing the result of the document creation.
     */
    public function createDocument(Request $request): Response
    {
        return $this->resource->createDocument($request);
    }

    public function createReceipt(Request $request): Response
    {
        return $this->resource->createReceipt($request);
    }

    public function createReceiptFromDraft(Request $request): Response
    {
        return $this->resource->createReceiptFromDraft($request->route('id'));
    }

    public function getDocumentByVendorId(Request $request): Response
    {
        return $this->resource->getDocumentByVendorId($request->route('id'));
    }

    public function createDocumentFromDraft(Request $request): Response
    {
        return $this->resource->createDocumentFromDraft($request->route('id'));
    }

    public function deleteDocument(Request $request): Response
    {
        return $this->resource->deleteDocument($request->route('id'));
    }

    public function archiveDocument(Request $request): Response
    {
        return $this->resource->archiveDocument($request->route('id'));
    }

    /**
     * Lists documents based on specified filters.
     *
     * @param  Request  $request The HTTP request object containing the filter parameters.
     * @return Response The response object containing the list of documents.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function listDocument(Request $request): Response
    {
        return $this->resource->listDocument(
            page: $request->get(key: 'page', default: 1),
            perPage: $request->get(key: 'per_page', default: 25),
            blockId: $request->get(key: 'block_id', default: 0),
            partnerId: $request->get(key: 'partner_id'),
            paymentMethod: $request->get(key: 'payment_method'),
            paymentStatus: $request->get(key: 'payment_status'),
            startDate: $request->get(key: 'start_date', default: now()->startOfYear()->format(format: 'Y-m-d')),
            endDate: $request->get(key: 'end_date', default: now()->format(format: 'Y-m-d')),
            startNumber: $request->get(key: 'start_number', default: 1),
            endNumber: $request->get(key: 'end_number', default: 10),
            startYear: $request->get(key: 'start_year', default: now()->startOfYear()->format(format: 'Y')),
            endYear: $request->get(key: 'end_year', default: now()->startOfYear()->format(format: 'Y')),
            type: $request->get(key: 'type', default: 'invoice'),
            documentQuery: $request->get(key: 'query'),
            paidStartDate: $request->get(key: 'paid_start_date'),
            paidEndDate: $request->get(key: 'paid_end_date'),
            fulfillmentStartDate: $request->get(key: 'fulfillment_start_date'),
            fulfillmentEndDate: $request->get(key: 'fulfillment_end_date'),
            lastModifiedDate: $request->get(key: 'last_modified_date')
        );
    }

    /**
     * Get a single document.
     *
     * @param  Request  $request The HTTP request object containing the document ID.
     * @return Response          The JSON response object with the document data and status.
     */
    public function getDocument(Request $request): Response
    {
        return $this->resource->getDocument(id: (int) $request->route(param: 'id'));
    }

    /**
     * Downloads a document as a PDF file.
     *
     * @param  Request  $request The HTTP request object containing the document ID.
     * @return StreamedResponse The streamed response object with the document content and headers.
     */
    public function downloadDocument(Request $request): StreamedResponse
    {
        try {
            $id = (int) $request->route(param: 'id');
            $getOneRequest = new GetDocument(id: $id);
            $fileName = Arr::get(array: $this->connector->send(request: $getOneRequest)->json(), key: 'invoice_number');

            $request = new DownloadDocument(id: $id);
            $request->headers()->add(key: 'Accept', value: 'application/pdf');
            $createResponse = $this->connector->send(request: $request);

            return response()->stream(callback: function () use ($createResponse) {
                echo $createResponse->body();
            }, status: 200, headers: [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename='.$fileName.'.pdf',
            ]);
        } catch (Exception $exception) {
            dd($exception);
        }
    }
}
