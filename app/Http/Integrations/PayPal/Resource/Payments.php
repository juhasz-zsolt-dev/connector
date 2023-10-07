<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\Payments\CaptureAuthorizedPayment;
use App\Http\Integrations\PayPal\Requests\Payments\ReauthorizeAuthorizedPayment;
use App\Http\Integrations\PayPal\Requests\Payments\RefundCapturedPayment;
use App\Http\Integrations\PayPal\Requests\Payments\ShowCapturedPaymentDetails;
use App\Http\Integrations\PayPal\Requests\Payments\ShowDetailsForAuthorizedPayment;
use App\Http\Integrations\PayPal\Requests\Payments\ShowRefundDetails;
use App\Http\Integrations\PayPal\Requests\Payments\VoidAuthorizedPayment;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class Payments extends Resource
{
    public function showDetailsForAuthorizedPayment(string $authorizationId): Response
    {
        return $this->connector->send(new ShowDetailsForAuthorizedPayment($authorizationId));
    }

    public function reauthorizeAuthorizedPayment(string $authorizationId, mixed $amount): Response
    {
        return $this->connector->send(new ReauthorizeAuthorizedPayment($authorizationId, $amount));
    }

    public function voidAuthorizedPayment(string $authorizationId): Response
    {
        return $this->connector->send(new VoidAuthorizedPayment($authorizationId));
    }

    public function captureAuthorizedPayment(
        string $authorizationId,
        mixed $amount,
        mixed $invoiceId,
        mixed $finalCapture,
        mixed $noteToPayer,
        mixed $softDescriptor,
    ): Response {
        return $this->connector->send(new CaptureAuthorizedPayment($authorizationId, $amount, $invoiceId, $finalCapture, $noteToPayer, $softDescriptor));
    }

    public function showCapturedPaymentDetails(string $captureId): Response
    {
        return $this->connector->send(new ShowCapturedPaymentDetails($captureId));
    }

    public function refundCapturedPayment(
        string $captureId,
        mixed $amount,
        mixed $invoiceId,
        mixed $noteToPayer,
    ): Response {
        return $this->connector->send(new RefundCapturedPayment($captureId, $amount, $invoiceId, $noteToPayer));
    }

    public function showRefundDetails(string $refundId): Response
    {
        return $this->connector->send(new ShowRefundDetails($refundId));
    }
}
