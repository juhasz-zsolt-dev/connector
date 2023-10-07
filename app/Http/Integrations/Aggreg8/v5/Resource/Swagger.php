<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Swagger\GetSwaggerDefinition;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Swagger extends Resource
{
	public function getSwaggerDefinition(): Response
	{
		return $this->connector->send(new GetSwaggerDefinition());
	}
}
