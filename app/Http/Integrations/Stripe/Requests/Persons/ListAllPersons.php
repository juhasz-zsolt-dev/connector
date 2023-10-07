<?php

namespace App\Http\Integrations\Stripe\Requests\Persons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all persons
 */
class ListAllPersons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/v1/accounts/{$this->account}/persons";
    }

    /**
     * @param  null|string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  null|string  $expand0 Specifies which fields in the response should be expanded.
     * @param  null|string  $expand1 Specifies which fields in the response should be expanded.
     * @param  null|string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  null|string  $relationshipdirector Filters on the list of people returned based on the person's relationship to the account's company.
     * @param  null|string  $relationshipexecutive Filters on the list of people returned based on the person's relationship to the account's company.
     * @param  null|string  $relationshipowner Filters on the list of people returned based on the person's relationship to the account's company.
     * @param  null|string  $relationshiprepresentative Filters on the list of people returned based on the person's relationship to the account's company.
     * @param  null|string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function __construct(
        protected string $account,
        protected ?string $endingBefore = null,
        protected ?string $expand0 = null,
        protected ?string $expand1 = null,
        protected ?string $limit = null,
        protected ?string $relationshipdirector = null,
        protected ?string $relationshipexecutive = null,
        protected ?string $relationshipowner = null,
        protected ?string $relationshiprepresentative = null,
        protected ?string $startingAfter = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'ending_before' => $this->endingBefore,
            'expand[0]' => $this->expand0,
            'expand[1]' => $this->expand1,
            'limit' => $this->limit,
            'relationship[director]' => $this->relationshipdirector,
            'relationship[executive]' => $this->relationshipexecutive,
            'relationship[owner]' => $this->relationshipowner,
            'relationship[representative]' => $this->relationshiprepresentative,
            'starting_after' => $this->startingAfter,
        ]);
    }
}
