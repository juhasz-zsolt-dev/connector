<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\FinancialConnectionsSessions\CreateSession;
use App\Http\Integrations\Stripe\Requests\FinancialConnectionsSessions\RetrieveSession;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class FinancialConnectionsSessions extends Resource
{
	public function createSession(): Response
	{
		return $this->connector->send(new CreateSession());
	}


	/**
	 * @param string $session
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveSession(string $session, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveSession($session, $expand0, $expand1));
	}
}
