<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Mandates\RetrieveMandate;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Mandates extends Resource
{
    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrieveMandate(string $mandate, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrieveMandate($mandate, $expand0, $expand1));
    }
}
