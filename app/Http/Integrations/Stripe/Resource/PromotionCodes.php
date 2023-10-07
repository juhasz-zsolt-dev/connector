<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\PromotionCodes\CreatePromotionCode;
use App\Http\Integrations\Stripe\Requests\PromotionCodes\ListAllPromotionCodes;
use App\Http\Integrations\Stripe\Requests\PromotionCodes\RetrievePromotionCode;
use App\Http\Integrations\Stripe\Requests\PromotionCodes\UpdatePromotionCode;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class PromotionCodes extends Resource
{
    /**
     * @param  string  $active Filter promotion codes by whether they are active.
     * @param  string  $code Only return promotion codes that have this case-insensitive code.
     * @param  string  $coupon Only return promotion codes for this coupon.
     * @param  string  $createdgt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdgte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdlt A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $createdlte A filter on the list, based on the object `created` field. The value can be a string with an integer Unix timestamp, or it can be a dictionary with a number of different query options.
     * @param  string  $customer Only return promotion codes that are restricted to this customer.
     * @param  string  $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     * @param  string  $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
     * @param  string  $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
     */
    public function listAllPromotionCodes(
        ?string $active,
        ?string $code,
        ?string $coupon,
        ?string $createdgt,
        ?string $createdgte,
        ?string $createdlt,
        ?string $createdlte,
        ?string $customer,
        ?string $endingBefore,
        ?string $expand0,
        ?string $expand1,
        ?string $limit,
        ?string $startingAfter,
    ): Response {
        return $this->connector->send(new ListAllPromotionCodes($active, $code, $coupon, $createdgt, $createdgte, $createdlt, $createdlte, $customer, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
    }

    public function createPromotionCode(): Response
    {
        return $this->connector->send(new CreatePromotionCode());
    }

    /**
     * @param  string  $expand0 Specifies which fields in the response should be expanded.
     * @param  string  $expand1 Specifies which fields in the response should be expanded.
     */
    public function retrievePromotionCode(string $promotionCode, ?string $expand0, ?string $expand1): Response
    {
        return $this->connector->send(new RetrievePromotionCode($promotionCode, $expand0, $expand1));
    }

    public function updatePromotionCode(string $promotionCode): Response
    {
        return $this->connector->send(new UpdatePromotionCode($promotionCode));
    }
}
