<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\SetupIntents\CancelSetupIntent;
use App\Http\Integrations\Stripe\Requests\SetupIntents\ConfirmSetupIntent;
use App\Http\Integrations\Stripe\Requests\SetupIntents\CreateSetupIntent;
use App\Http\Integrations\Stripe\Requests\SetupIntents\ListAllSetupIntents;
use App\Http\Integrations\Stripe\Requests\SetupIntents\RetrieveSetupIntent;
use App\Http\Integrations\Stripe\Requests\SetupIntents\UpdateSetupIntent;
use App\Http\Integrations\Stripe\Requests\SetupIntents\VerifyMicrodepositsOnSetupIntent;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class SetupIntents extends Resource
{
    /**
     * @param  string  $attachToSelf If present, the SetupIntent's payment method will be attached to the in-context Stripe Account.
     *
     * It can only be used for this Stripe Account’s own money movement flows like InboundTransfer and OutboundTransfers. It cannot be set to true when setting up a PaymentMethod for a Customer, and defaults to false when attaching a PaymentMethod to a Customer.
     * @param  string  $createdgt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdgte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdlt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdlte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $customer Only return SetupIntents for the customer specified by this customer ID.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $paymentMethod Only return SetupIntents associated with the specified payment method.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllSetupIntents(
        ?string $attachToSelf,
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $paymentMethod,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllSetupIntents($attachToSelf, $createdgt, $createdgte, $createdlt, $createdlte, $customer, $endingBefore, $expand0, $expand1, $limit, $paymentMethod, $startingAfter));
    }

    public function createSetupIntent(): Response
    {
        return $this->connector->send(new CreateSetupIntent());
    }

    /**
     * @param  string  $clientSecret The client secret of the SetupIntent. Required if a publishable key is used to retrieve the SetupIntent.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveSetupIntent(
        string $intent,
        ?string $clientSecret,
        ?string $expand0,
        ?string $expand1,
    ): Response {
        return $this->connector->send(new RetrieveSetupIntent($intent, $clientSecret, $expand0, $expand1));
    }

    public function updateSetupIntent(string $intent): Response
    {
        return $this->connector->send(new UpdateSetupIntent($intent));
    }

    public function cancelSetupIntent(string $intent): Response
    {
        return $this->connector->send(new CancelSetupIntent($intent));
    }

    public function confirmSetupIntent(string $intent): Response
    {
        return $this->connector->send(new ConfirmSetupIntent($intent));
    }

    public function verifyMicrodepositsOnSetupIntent(string $intent): Response
    {
        return $this->connector->send(new VerifyMicrodepositsOnSetupIntent($intent));
    }
}
