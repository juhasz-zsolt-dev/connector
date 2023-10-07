<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Util\CheckTaxNumber;
use App\Http\Integrations\Billingo\Requests\Util\GetId;
use App\Http\Integrations\Billingo\Requests\Util\GetServerTime;
use App\Http\Integrations\Billingo\Resource;
use ReflectionException;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Http\Response;

class Util extends Resource
{
    /**
     * Checks the validity of a tax number.
     *
     * @param  string  $taxNumber The tax number to be checked.
     * @return Response The response object containing the result of the tax number check.
     *
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function checkTaxNumber(string $taxNumber): Response
    {
        return $this->connector->send(new CheckTaxNumber($taxNumber));
    }

    /**
     * Converts a legacy ID to a Response object.
     *
     * @param  int  $id The legacy ID to convert.
     * @return Response The converted Response object.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function convertLegacyId(int $id): Response
    {
        return $this->connector->send(new GetId($id));
    }

    /**
     * Retrieves the server time from the `connector` object.
     *
     * @return Response The response object returned by the 'send' method of the 'connector' object.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function getServerTime(): Response
    {
        return $this->connector->send(new GetServerTime());
    }
}
