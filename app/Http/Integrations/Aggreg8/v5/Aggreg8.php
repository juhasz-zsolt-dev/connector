<?php

namespace App\Http\Integrations\Aggreg8\v5;

use App\Http\Integrations\Aggreg8\v5\Resource\Accounts;
use App\Http\Integrations\Aggreg8\v5\Resource\Categories;
use App\Http\Integrations\Aggreg8\v5\Resource\ConsentedAccounts;
use App\Http\Integrations\Aggreg8\v5\Resource\Customer;
use App\Http\Integrations\Aggreg8\v5\Resource\Health;
use App\Http\Integrations\Aggreg8\v5\Resource\Init;
use App\Http\Integrations\Aggreg8\v5\Resource\Logo;
use App\Http\Integrations\Aggreg8\v5\Resource\Misc;
use App\Http\Integrations\Aggreg8\v5\Resource\State;
use App\Http\Integrations\Aggreg8\v5\Resource\Swagger;
use App\Http\Integrations\Aggreg8\v5\Resource\Token;
use App\Http\Integrations\Aggreg8\v5\Resource\Transactions;
use App\Http\Integrations\Aggreg8\v5\Resource\Users;
use Saloon\Http\Connector;

/**
 * a8-ais-api
 */
class Aggreg8 extends Connector
{
	public function resolveBaseUrl(): string
	{
		return '/';
	}


	public function accounts(): Accounts
	{
		return new Accounts($this);
	}


	public function categories(): Categories
	{
		return new Categories($this);
	}


	public function consentedAccounts(): ConsentedAccounts
	{
		return new ConsentedAccounts($this);
	}


	public function customer(): Customer
	{
		return new Customer($this);
	}


	public function health(): Health
	{
		return new Health($this);
	}


	public function init(): Init
	{
		return new Init($this);
	}


	public function logo(): Logo
	{
		return new Logo($this);
	}


	public function misc(): Misc
	{
		return new Misc($this);
	}


	public function state(): State
	{
		return new State($this);
	}


	public function swagger(): Swagger
	{
		return new Swagger($this);
	}


	public function token(): Token
	{
		return new Token($this);
	}


	public function transactions(): Transactions
	{
		return new Transactions($this);
	}


	public function users(): Users
	{
		return new Users($this);
	}
}
