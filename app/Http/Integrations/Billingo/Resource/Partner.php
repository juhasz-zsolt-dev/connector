<?php

namespace App\Http\Integrations\Billingo\Resource;

use App\Http\Integrations\Billingo\Requests\Partner\CreatePartner;
use App\Http\Integrations\Billingo\Requests\Partner\DeletePartner;
use App\Http\Integrations\Billingo\Requests\Partner\GetPartner;
use App\Http\Integrations\Billingo\Requests\Partner\ListPartner;
use App\Http\Integrations\Billingo\Requests\Partner\UpdatePartner;
use App\Http\Integrations\Billingo\Resource;
use ReflectionException;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Http\Response;

class Partner extends Resource
{
    /**
     * Lists partners based on the provided parameters.
     *
     * @param  int|null  $page The page number to fetch. Set to null to fetch all partners.
     * @param  int|null  $perPage The number of partners per page. Set to null to use default per page value.
     * @param  string|null  $query The search query string to filter partners. Set to null to fetch all partners.
     * @return Response The response object containing the list of partners.
     *
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function listPartner(?int $page, ?int $perPage, ?string $query): Response
    {
        return $this->connector->send(request: new ListPartner(page: $page, perPage: $perPage, partnerQuery: $query)
        );
    }

    /**
     * Create a new partner.
     *
     * @return Response The response from creating the partner.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function createPartner(): Response
    {
        return $this->connector->send(request: new CreatePartner());
    }

    /**
     * Retrieves the partner information based on the given id.
     *
     * @param  int  $id The id of the partner to retrieve.
     * @return Response The response from the connector after sending the GetPartner request.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function getPartner(int $id): Response
    {
        return $this->connector->send(request: new GetPartner(id: $id));
    }

    /**
     * Updates the partner information based on the given id.
     *
     * @param  int  $id The id of the partner to update.
     * @return Response The response from the connector after sending the UpdatePartner request.
     *
     * @throws InvalidResponseClassException If the response class is invalid.
     * @throws PendingRequestException If there is a pending request.
     * @throws ReflectionException If there is an error during reflection.
     */
    public function updatePartner(int $id): Response
    {
        return $this->connector->send(request: new UpdatePartner(id: $id));
    }

    /**
     * Deletes a partner based on the given id.
     *
     * @param  int  $id The id of the partner to delete.
     * @return Response The response from the connector after sending the DeletePartner request.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function deletePartner(int $id): Response
    {
        return $this->connector->send(request: new DeletePartner(id: $id));
    }
}
