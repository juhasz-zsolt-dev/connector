<?php

namespace App\Http\Controllers\Integrations\Billingo;

use App\Http\Controllers\Controller;
use App\Http\Integrations\Billingo\Billingo;
use App\Http\Integrations\Billingo\Resource\Partner;
use App\Persistence\Services\ApiKeyResolver;
use Illuminate\Http\Request;
use ReflectionException;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Http\Connector;
use Saloon\Http\Response;

class PartnerController extends Controller
{
    private Connector $connector;

    private Partner $resource;

    public function __construct()
    {
        $this->connector = new Billingo(apiKey: ApiKeyResolver::getBillingoKey());
        $this->resource = new Partner(connector: $this->connector);
    }

    /**
     * Lists partners.
     *
     * @param  Request  $request The HTTP request object containing the page number and query parameter.
     * @return Response The list of partners.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function listPartner(Request $request): Response
    {
        return $this->resource->listPartner(
            page: $request->get(key: 'page'),
            perPage: $request->get(key: 'per_page'),
            query: $request->get(key: 'query')
        );
    }

    public function createPartner(Request $request): Response
    {
        return $this->resource->createPartner();
    }

    /**
     * Retrieves a partner using the given request.
     *
     * @param  Request  $request The request object containing the partner id.
     * @return Response The response from the resource's getPartner method.
     *
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function getPartner(Request $request): Response
    {
        return $this->resource->getPartner(
            id: $request->route(param: 'id')
        );
    }

    /**
     * Updates a partner using the given request.
     *
     * @param  Request  $request The request object containing the partner id.
     * @return Response The response from the resource's updatePartner method.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function updatePartner(Request $request): Response
    {
        return $this->resource->updatePartner(
            id: $request->route(param: 'id')
        );
    }

    /**
     * Deletes a partner using the given request.
     *
     * @param  Request  $request The request object containing the partner id.
     * @return Response The response from the resource's deletePartner method.
     *
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function deletePartner(Request $request): Response
    {
        return $this->resource->deletePartner(
            id: $request->route(param: 'id')
        );
    }
}
