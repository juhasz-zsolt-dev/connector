<?php

namespace App\Http\Integrations\Stripe\Requests\FileLinks;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update a file link
 */
class UpdateFileLink extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/v1/file_links/{$this->link}";
	}


	/**
	 * @param string $link
	 */
	public function __construct(
		protected string $link,
	) {
	}
}
