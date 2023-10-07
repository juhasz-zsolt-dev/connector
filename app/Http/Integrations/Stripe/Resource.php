<?php

namespace App\Http\Integrations\Stripe;

use Saloon\Http\Connector;

class Resource
{
	public function __construct(
		protected Connector $connector,
	) {
	}
}
