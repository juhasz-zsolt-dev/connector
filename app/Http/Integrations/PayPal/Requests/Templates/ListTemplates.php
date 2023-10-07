<?php

namespace App\Http\Integrations\PayPal\Requests\Templates;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List templates
 */
class ListTemplates extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v2/invoicing/templates";
	}


	/**
	 * @param null|string $fields The fields to return in the response. Value is `all` or `none`. To return only the template name, ID, and default attributes, specify `none`.
	 * @param null|string $page The page number to be retrieved, for the list of templates. So, a combination of `page=1` and `page_size=20` returns the first 20 templates. A combination of `page=2` and `page_size=20` returns the next 20 templates.
	 * @param null|string $pageSize The maximum number of templates to return in the response.
	 */
	public function __construct(
		protected ?string $fields = null,
		protected ?string $page = null,
		protected ?string $pageSize = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['fields' => $this->fields, 'page' => $this->page, 'page_size' => $this->pageSize]);
	}
}
