<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Quotes\AcceptQuote;
use App\Http\Integrations\Stripe\Requests\Quotes\CancelQuote;
use App\Http\Integrations\Stripe\Requests\Quotes\CreateQuote;
use App\Http\Integrations\Stripe\Requests\Quotes\DownloadQuotePdf;
use App\Http\Integrations\Stripe\Requests\Quotes\FinalizeQuote;
use App\Http\Integrations\Stripe\Requests\Quotes\ListAllQuotes;
use App\Http\Integrations\Stripe\Requests\Quotes\RetrieveQuote;
use App\Http\Integrations\Stripe\Requests\Quotes\UpdateQuote;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Quotes extends Resource
{
	/**
	 * @param string $customer The ID of the customer whose quotes will be retrieved.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $status The status of the quote.
	 * @param string $testClock Provides a list of quotes that are associated with the specified test clock. The response will not include quotes with test clocks if this and the customer parameter is not set.
	 */
	public function listAllQuotes(
		?string $customer,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
		?string $status,
		?string $testClock,
	): Response
	{
		return $this->connector->send(new ListAllQuotes($customer, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $status, $testClock));
	}


	public function createQuote(): Response
	{
		return $this->connector->send(new CreateQuote());
	}


	/**
	 * @param string $quote
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveQuote(string $quote, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveQuote($quote, $expand0, $expand1));
	}


	/**
	 * @param string $quote
	 */
	public function updateQuote(string $quote): Response
	{
		return $this->connector->send(new UpdateQuote($quote));
	}


	/**
	 * @param string $quote
	 */
	public function acceptQuote(string $quote): Response
	{
		return $this->connector->send(new AcceptQuote($quote));
	}


	/**
	 * @param string $quote
	 */
	public function cancelQuote(string $quote): Response
	{
		return $this->connector->send(new CancelQuote($quote));
	}


	/**
	 * @param string $quote
	 */
	public function finalizeQuote(string $quote): Response
	{
		return $this->connector->send(new FinalizeQuote($quote));
	}


	/**
	 * @param string $quote
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function downloadQuotePdf(string $quote, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new DownloadQuotePdf($quote, $expand0, $expand1));
	}
}
