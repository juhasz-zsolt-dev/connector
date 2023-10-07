<?php

namespace App\Http\Integrations\PayPal\Requests\Plans;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List plans
 */
class ListPlans extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/billing/plans";
	}


	/**
	 * @param null|string $productId Filters the response by a Product ID.
	 * @param null|string $planIds Filters the response by list of plan IDs. Filter supports upto 10 plan IDs.
	 * @param null|string $pageSize The number of items to return in the response.
	 * @param null|string $page A non-zero integer which is the start index of the entire list of items to return in the response. The combination of `page=1` and `page_size=20` returns the first 20 items. The combination of `page=2` and `page_size=20` returns the next 20 items.
	 * @param null|string $totalRequired Indicates whether to show the total count in the response.
	 */
	public function __construct(
		protected ?string $productId = null,
		protected ?string $planIds = null,
		protected ?string $pageSize = null,
		protected ?string $page = null,
		protected ?string $totalRequired = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'product_id' => $this->productId,
			'plan_ids' => $this->planIds,
			'page_size' => $this->pageSize,
			'page' => $this->page,
			'total_required' => $this->totalRequired,
		]);
	}
}
