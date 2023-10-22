<?php

namespace App\Http\Integrations\Billingo;

use App\Http\Integrations\Billingo\Resource\BankAccount;
use App\Http\Integrations\Billingo\Resource\Currency;
use App\Http\Integrations\Billingo\Resource\Document;
use App\Http\Integrations\Billingo\Resource\DocumentBlock;
use App\Http\Integrations\Billingo\Resource\DocumentExport;
use App\Http\Integrations\Billingo\Resource\Organization;
use App\Http\Integrations\Billingo\Resource\Partner;
use App\Http\Integrations\Billingo\Resource\Product;
use App\Http\Integrations\Billingo\Resource\Spending;
use App\Http\Integrations\Billingo\Resource\Util;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

/**
 * Billingo API v3
 *
 * This is a Billingo API v3 documentation. Our API based on REST software architectural style. API has resource-oriented URLs, accepts JSON-encoded request bodies and returns JSON-encoded responses. To use this API you have to generate a new API key on our [site](https://app.billingo.hu/api-key). After that, you can test your API key on this page.
 */
class Billingo extends Connector
{
    use AcceptsJson;

    public function __construct(private readonly string $apiKey)
    {
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.billingo.hu/v3';
    }

    /**
     * Default headers for every request
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'x-api-key' => $this->apiKey,
        ];
    }

    public function bankAccount(): BankAccount
    {
        return new BankAccount($this);
    }

    public function currency(): Currency
    {
        return new Currency($this);
    }

    public function document(): Document
    {
        return new Document($this);
    }

    public function documentBlock(): DocumentBlock
    {
        return new DocumentBlock($this);
    }

    public function documentExport(): DocumentExport
    {
        return new DocumentExport($this);
    }

    public function organization(): Organization
    {
        return new Organization($this);
    }

    public function partner(): Partner
    {
        return new Partner($this);
    }

    public function product(): Product
    {
        return new Product($this);
    }

    public function spending(): Spending
    {
        return new Spending($this);
    }

    public function util(): Util
    {
        return new Util($this);
    }
}
