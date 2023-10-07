<?php

namespace App\Http\Integrations\PayPal;

use Saloon\Http\Connector;

class Resource
{
	public function __construct(
		protected Connector $connector,
	) {
	}
}
