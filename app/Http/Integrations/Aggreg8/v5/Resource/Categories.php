<?php

namespace App\Http\Integrations\Aggreg8\v5\Resource;

use App\Http\Integrations\Aggreg8\v5\Requests\Categories\GetCategoryById;
use App\Http\Integrations\Aggreg8\v5\Resource;
use Saloon\Http\Response;

class Categories extends Resource
{
	/**
	 * @param string $categoryId
	 */
	public function getCategoryById(string $categoryId): Response
	{
		return $this->connector->send(new GetCategoryById($categoryId));
	}
}
