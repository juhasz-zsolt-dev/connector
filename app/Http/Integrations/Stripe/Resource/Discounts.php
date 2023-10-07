<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Discounts\DeleteCustomerDiscount;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Discounts extends Resource
{
    public function deleteCustomerDiscount(string $customer): Response
    {
        return $this->connector->send(new DeleteCustomerDiscount($customer));
    }
}
