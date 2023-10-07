<?php

namespace App\Http\Integrations\PayPal\Requests\TransactionSearch;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * List all balances
 */
class ListAllBalances extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/reporting/balances';
    }

    /**
     * @param  null|string  $asOfTime List balances in the response at the date time provided, will return the last refreshed balance in the system when not provided.
     * @param  null|string  $currencyCode Filters the transactions in the response by a [three-character ISO-4217 currency code](https://developer.paypal.com/docs/api/reference/currency-codes/) for the PayPal transaction currency.
     * @param  null|string  $includeCryptoCurrencies Indicates whether the response list balances including crypto transactions. Value is either:<ul><li><code>false</code>. The default. The response doesn't include crypto transactions.</li><li><code>true</code>. The response also includes crypto transactions.</li></ul>
     */
    public function __construct(
        protected ?string $asOfTime = null,
        protected ?string $currencyCode = null,
        protected ?string $includeCryptoCurrencies = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'as_of_time' => $this->asOfTime,
            'currency_code' => $this->currencyCode,
            'include_crypto_currencies' => $this->includeCryptoCurrencies,
        ]);
    }
}
