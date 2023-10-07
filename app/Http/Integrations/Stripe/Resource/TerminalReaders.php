<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\TerminalReaders\CancelTheCurrentReaderAction;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\CreateReader;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\DeleteReader;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\HandOffPaymentIntentToReader;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\HandOffSetupIntentToReader;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\ListAllReaders;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\RetrieveReader;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\SetReaderDisplay;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\SimulatePresentingPaymentMethod;
use App\Http\Integrations\Stripe\Requests\TerminalReaders\UpdateReader;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class TerminalReaders extends Resource
{
    /**
     * @param  string  $deviceType Filters readers by device type
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $location A location ID to filter the response list to only readers at the specific location
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status A status filter to filter readers to only offline or online readers
     */
    public function listAllReaders(
        ?string $deviceType,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $location,
        ?string $startingAfter,
        ?string $status,
    ): Response {
        return $this->connector->send(new ListAllReaders($deviceType, $endingBefore, $expand0, $expand1, $limit, $location, $startingAfter, $status));
    }

    public function createReader(): Response
    {
        return $this->connector->send(new CreateReader());
    }

    public function deleteReader(string $reader): Response
    {
        return $this->connector->send(new DeleteReader($reader));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveReader(string $reader, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveReader($reader, $expand0, $expand1));
    }

    public function updateReader(string $reader): Response
    {
        return $this->connector->send(new UpdateReader($reader));
    }

    public function cancelTheCurrentReaderAction(string $reader): Response
    {
        return $this->connector->send(new CancelTheCurrentReaderAction($reader));
    }

    public function handOffPaymentIntentToReader(string $reader): Response
    {
        return $this->connector->send(new HandOffPaymentIntentToReader($reader));
    }

    public function handOffSetupIntentToReader(string $reader): Response
    {
        return $this->connector->send(new HandOffSetupIntentToReader($reader));
    }

    public function setReaderDisplay(string $reader): Response
    {
        return $this->connector->send(new SetReaderDisplay($reader));
    }

    public function simulatePresentingPaymentMethod(string $reader): Response
    {
        return $this->connector->send(new SimulatePresentingPaymentMethod($reader));
    }
}
