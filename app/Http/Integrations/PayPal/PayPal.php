<?php

namespace App\Http\Integrations\PayPal;

use App\Http\Integrations\PayPal\Resource\Authorization;
use App\Http\Integrations\PayPal\Resource\CatalogProducts;
use App\Http\Integrations\PayPal\Resource\Disputes;
use App\Http\Integrations\PayPal\Resource\Invoices;
use App\Http\Integrations\PayPal\Resource\ManageAccounts;
use App\Http\Integrations\PayPal\Resource\Orders;
use App\Http\Integrations\PayPal\Resource\Payments;
use App\Http\Integrations\PayPal\Resource\Payouts;
use App\Http\Integrations\PayPal\Resource\Plans;
use App\Http\Integrations\PayPal\Resource\ShipmentTracking;
use App\Http\Integrations\PayPal\Resource\Subscriptions;
use App\Http\Integrations\PayPal\Resource\Templates;
use App\Http\Integrations\PayPal\Resource\TransactionSearch;
use App\Http\Integrations\PayPal\Resource\Webhooks;
use Saloon\Http\Connector;

/**
 * PayPal APIs
 */
class PayPal extends Connector
{
	public function resolveBaseUrl(): string
	{
		return 'TODO';
	}


	public function authorization(): Authorization
	{
		return new Authorization($this);
	}


	public function catalogProducts(): CatalogProducts
	{
		return new CatalogProducts($this);
	}


	public function disputes(): Disputes
	{
		return new Disputes($this);
	}


	public function invoices(): Invoices
	{
		return new Invoices($this);
	}


	public function manageAccounts(): ManageAccounts
	{
		return new ManageAccounts($this);
	}


	public function orders(): Orders
	{
		return new Orders($this);
	}


	public function payments(): Payments
	{
		return new Payments($this);
	}


	public function payouts(): Payouts
	{
		return new Payouts($this);
	}


	public function plans(): Plans
	{
		return new Plans($this);
	}


	public function shipmentTracking(): ShipmentTracking
	{
		return new ShipmentTracking($this);
	}


	public function subscriptions(): Subscriptions
	{
		return new Subscriptions($this);
	}


	public function templates(): Templates
	{
		return new Templates($this);
	}


	public function transactionSearch(): TransactionSearch
	{
		return new TransactionSearch($this);
	}


	public function webhooks(): Webhooks
	{
		return new Webhooks($this);
	}
}
