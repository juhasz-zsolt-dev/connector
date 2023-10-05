<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Billingo\BillingoConnector;
use App\Http\Integrations\Billingo\Requests\CreateDocument;
use App\Http\Integrations\Billingo\Requests\DownloadDocument;
use App\Http\Integrations\Billingo\Requests\GetDocumentList;
use App\Http\Integrations\Billingo\Requests\GetDocumentListForVendor;
use App\Http\Integrations\Billingo\Requests\GetOneDocument;
use App\Persistence\Enums\Billingo\Currency;
use App\Persistence\Enums\Billingo\Language;
use App\Persistence\Enums\Billingo\PaymentMethod;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Saloon\Contracts\Connector;
use Saloon\Helpers\Arr;

class BillingoController extends Controller
{
    private Connector $connector;

    public function __construct()
    {
        $this->connector = new BillingoConnector("2140df9a-2ea3-11ec-a040-0adb4fd9a356");
    }

    public function createDocument(Request $request): JsonResponse
    {
        try {
            $makeDocumentRequest = new CreateDocument;
            $makeDocumentRequest->body()->merge([
//                "vendor_id" => $request->get("vendor_id"), // Szállító
                "partner_id" => $request->get("partner_id"),
                "block_id" => $request->get('block_id', 0),
                "bank_account_id" => $request->get('bank_account_id', 0),
                "type" => "advance",
                "fulfillment_date" => $request->get("fulfillment_date", now()->format("Y-m-d")),
                "due_date" => $request->get('due_date', now()->addDays(8)->format("Y-m-d")),
                "payment_method" => PaymentMethod::BANKCARD->value,
                "language" => Language::HU->value,
                "currency" => Currency::HUF->value,
                "conversion_rate" => 1,
                "electronic" => false,
                "paid" => false,
                "items" => $request->get('items'),
                "comment" => "string",
                "settings" => [
                    "mediated_service" => false,
                    "without_financial_fulfillment" => false,
                    "online_payment" => "",
                    "round" => "five",
                    "no_send_onlineszamla_by_user" => true,
                    "order_number" => "string",
                    "place_id" => 0,
                    "instant_payment" => true,
                    "selected_type" => "advance"
                ],
//                "advance_invoice" => [ // Előlegszámla
//                    0
//                ],
                "discount" => [
                    "type" => "percent",
                    "value" => 0
                ],
                "instant_payment" => true
            ]);
            $createResponse = $this->connector->send($makeDocumentRequest);
            return response()->json($createResponse->json(), $createResponse->status());
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    public function getDocumentList(Request $request): JsonResponse
    {
        try {
            $request = new GetDocumentList(
                page: $request->get("page", 1),
                per_page: $request->get("per_page", 25),
                payment_method: $request->get("payment_method"),
                payment_status: $request->get("payment_status"),
                start_date: $request->get("start_date", now()->startOfYear()->format("Y-m-d")),
                end_date: $request->get("end_date", now()->format("Y-m-d")),
                start_number: $request->get("start_number", 1),
                end_number: $request->get("end_number", 10),
                start_year: $request->get("start_year", now()->startOfYear()->format('Y')),
                end_year: $request->get("end_year", now()->startOfYear()->format('Y')),
                type: $request->get("type", 'invoice'),
                paid_start_date: $request->get("paid_start_date"),
                paid_end_date: $request->get("paid_end_date"),
                fulfillment_start_date: $request->get("fulfillment_start_date"),
                fulfillment_end_date: $request->get("fulfillment_end_date"),
                last_modified_date: $request->get("last_modified_date")
            );
            $createResponse = $this->connector->send($request);
            return response()->json($createResponse->json(), $createResponse->status());
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    public function getOneDocument(Request $request): JsonResponse
    {
        try {
            $request = new GetOneDocument((int)$request->route("id"));
            $createResponse = $this->connector->send($request);
            return response()->json($createResponse->json(), $createResponse->status());
        } catch (Exception $exception) {
            dd($exception);
        }
    }

    public function downloadDocument(Request $request)
    {
        try {
            $id = (int)$request->route("id");
            $getOneRequest = new GetOneDocument($id);
            $fileName = Arr::get($this->connector->send($getOneRequest)->json(), "invoice_number");

            $request = new DownloadDocument($id);
            $request->headers()->add("Accept", "application/pdf");
            $createResponse = $this->connector->send($request);
            return response()->stream(function () use ($createResponse) {
                echo $createResponse->body();
            }, 200, [
                "Content-Type" => "application/pdf",
                "Content-Disposition" => "attachment; filename=".$fileName.".pdf"
            ]);
        }catch (Exception $exception){
            dd($exception);
        }
    }
}
