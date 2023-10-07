<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Identity\CancelVerificationSession;
use App\Http\Integrations\Stripe\Requests\Identity\CreateVerificationSession;
use App\Http\Integrations\Stripe\Requests\Identity\ListVerficationReports;
use App\Http\Integrations\Stripe\Requests\Identity\ListVerificationSessions;
use App\Http\Integrations\Stripe\Requests\Identity\RedactVerificationSession;
use App\Http\Integrations\Stripe\Requests\Identity\RetrieveVerificationReport;
use App\Http\Integrations\Stripe\Requests\Identity\RetrieveVerificationSession;
use App\Http\Integrations\Stripe\Requests\Identity\UpdateVerificationSession;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Identity extends Resource
{
    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $type Only return VerificationReports of this type
     * @param  string  $verificationSession Only return VerificationReports created by this VerificationSession ID. It is allowed to provide a VerificationIntent ID.
     */
    public function listVerficationReports(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
        ?string $type,
        ?string $verificationSession,
    ): Response {
        return $this->connector->send(new ListVerficationReports($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $type, $verificationSession));
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveVerificationReport(string $report, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveVerificationReport($report, $expand0, $expand1));
    }

    /**
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     * @param  string  $status Only return VerificationSessions with this status. [Learn more about the lifecycle of sessions](https://stripe.com/docs/identity/how-sessions-work).
     */
    public function listVerificationSessions(
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
        ?string $status,
    ): Response {
        return $this->connector->send(new ListVerificationSessions($createdgt, $createdgte, $createdlt, $createdlte, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $status));
    }

    public function createVerificationSession(): Response
    {
        return $this->connector->send(new CreateVerificationSession());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveVerificationSession(string $session, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveVerificationSession($session, $expand0, $expand1));
    }

    public function updateVerificationSession(string $session): Response
    {
        return $this->connector->send(new UpdateVerificationSession($session));
    }

    public function cancelVerificationSession(string $session): Response
    {
        return $this->connector->send(new CancelVerificationSession($session));
    }

    public function redactVerificationSession(string $session): Response
    {
        return $this->connector->send(new RedactVerificationSession($session));
    }
}
