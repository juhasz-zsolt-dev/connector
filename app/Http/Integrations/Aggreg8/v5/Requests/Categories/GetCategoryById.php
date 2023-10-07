<?php

namespace App\Http\Integrations\Aggreg8\v5\Requests\Categories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * get Category By Id
 */
class GetCategoryById extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/categories/{$this->categoryId}";
    }

    public function __construct(
        protected string $categoryId,
    ) {
    }
}
