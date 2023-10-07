<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Token\GetToken;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Token extends Resource
{
	public function getToken(): Response
	{
		return $this->connector->send(new GetToken());
	}
}
