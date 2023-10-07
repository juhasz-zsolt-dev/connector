<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Sources\AttachSource;
use App\Http\Integrations\Stripe\Requests\Sources\CreateSource;
use App\Http\Integrations\Stripe\Requests\Sources\DetachSource;
use App\Http\Integrations\Stripe\Requests\Sources\ListAllSources;
use App\Http\Integrations\Stripe\Requests\Sources\RetrieveCustomerBankAccountOrCard;
use App\Http\Integrations\Stripe\Requests\Sources\RetrieveSource;
use App\Http\Integrations\Stripe\Requests\Sources\UpdateSource;
use App\Http\Integrations\Stripe\Requests\Sources\VerifyCustomerBankAccount;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Sources extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $object Filter sources according to a particular object type.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllSources(
        string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $object,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllSources($customer, $endingBefore, $expand0, $expand1, $limit, $object, $startingAfter));
    }

    public function attachSource(string $customer): Response
    {
        return $this->connector->send(new AttachSource($customer));
    }

    public function detachSource(string $customer, string $id): Response
    {
        return $this->connector->send(new DetachSource($customer, $id));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveCustomerBankAccountOrCard(
        string $customer,
        string $id,
        ?string $expand0,
        ?string $expand1,
    ): Response {
        return $this->connector->send(new RetrieveCustomerBankAccountOrCard($customer, $id, $expand0, $expand1));
    }

    public function updateSource(string $customer, string $id): Response
    {
        return $this->connector->send(new UpdateSource($customer, $id));
    }

    public function verifyCustomerBankAccount(string $customer, string $id): Response
    {
        return $this->connector->send(new VerifyCustomerBankAccount($customer, $id));
    }

    public function createSource(): Response
    {
        return $this->connector->send(new CreateSource());
    }

    /**
     * @param  string  $clientSecret The client secret of the source. Required if a publishable key is used to retrieve the source.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveSource(string $source, ?string $clientSecret, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveSource($source, $clientSecret, $expand0, $expand1));
    }

    /**
     * @todo Fix duplicated method name
     */
    public function updateSourceDuplicate1(string $source): Response
    {
        return $this->connector->send(new UpdateSource($source));
    }
}
