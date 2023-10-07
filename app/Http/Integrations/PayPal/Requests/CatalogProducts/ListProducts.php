<?php

namespace App\Http\Integrations\PayPal\Requests\CatalogProducts;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List products
 */
class ListProducts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/catalogs/products";
	}


	/**
	 * @param null|string $pageSize The number of items to return in the response.
	 * @param null|string $page A non-zero integer which is the start index of the entire list of items that are returned in the response. So, the combination of `page=1` and `page_size=20` returns the first 20 items. The combination of `page=2` and `page_size=20` returns the next 20 items.
	 * @param null|string $totalRequired Indicates whether to show the total items and total pages in the response.
	 */
	public function __construct(
		protected ?string $pageSize = null,
		protected ?string $page = null,
		protected ?string $totalRequired = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page_size' => $this->pageSize, 'page' => $this->page, 'total_required' => $this->totalRequired]);
	}
}
