<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\PaymentMethods\AttachPaymentMethod;
use App\Http\Integrations\Stripe\Requests\PaymentMethods\CreatePaymentMethod;
use App\Http\Integrations\Stripe\Requests\PaymentMethods\DetachPaymentMethod;
use App\Http\Integrations\Stripe\Requests\PaymentMethods\ListCustomerPaymentMethods;
use App\Http\Integrations\Stripe\Requests\PaymentMethods\ListPaymentMethods;
use App\Http\Integrations\Stripe\Requests\PaymentMethods\RetrievePaymentMethod;
use App\Http\Integrations\Stripe\Requests\PaymentMethods\UpdatePaymentMethod;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class PaymentMethods extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $type (Required) A required filter on the list, based on the object `type` field.
     */
    public function listCustomerPaymentMethods(
        string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
        ?string $type,
    ): Response {
        return $this->connector->send(new ListCustomerPaymentMethods($customer, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $type));
    }

    /**
     * @param  string  $customer The ID of the customer whose PaymentMethods will be retrieved.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $type (Required) A required filter on the list, based on the object `type` field.
     */
    public function listPaymentMethods(
        ?string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
        ?string $type,
    ): Response {
        return $this->connector->send(new ListPaymentMethods($customer, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $type));
    }

    public function createPaymentMethod(): Response
    {
        return $this->connector->send(new CreatePaymentMethod());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrievePaymentMethod(string $paymentMethod, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrievePaymentMethod($paymentMethod, $expand0, $expand1));
    }

    public function updatePaymentMethod(string $paymentMethod): Response
    {
        return $this->connector->send(new UpdatePaymentMethod($paymentMethod));
    }

    public function attachPaymentMethod(string $paymentMethod): Response
    {
        return $this->connector->send(new AttachPaymentMethod($paymentMethod));
    }

    public function detachPaymentMethod(string $paymentMethod): Response
    {
        return $this->connector->send(new DetachPaymentMethod($paymentMethod));
    }
}
