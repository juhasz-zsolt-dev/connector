<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Tokens\CreateToken;
use App\Http\Integrations\Stripe\Requests\Tokens\RetrieveToken;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Tokens extends Resource
{
	public function createToken(): Response
	{
		return $this->connector->send(new CreateToken());
	}


	/**
	 * @param string $token
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveToken(string $token, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveToken($token, $expand0, $expand1));
	}
}
