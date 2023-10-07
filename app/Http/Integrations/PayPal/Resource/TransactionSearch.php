<?php

namespace App\Http\Integrations\PayPal\Resource;

use App\Http\Integrations\PayPal\Requests\TransactionSearch\ListAllBalances;
use App\Http\Integrations\PayPal\Requests\TransactionSearch\ListTransactions;
use App\Http\Integrations\PayPal\Resource;
use Saloon\Http\Response;

class TransactionSearch extends Resource
{
    /**
     * @param  string  $fields Indicates which fields appear in the response. Value is a single field or a comma-separated list of fields. The <code>transaction_info</code> value returns only the transaction details in the response. To include all fields in the response, specify <code>fields=all</code>. Valid fields are:<ul><li><a href="https://developer.paypal.com/api/transaction-search/v1/#definition-transaction_info"><code>transaction_info</code></a>. The transaction information. Includes the ID of the PayPal account of the payee, the PayPal-generated transaction ID, the PayPal-generated base ID, the PayPal reference ID type, the transaction event code, the date and time when the transaction was initiated and was last updated, the transaction amounts including the PayPal fee, any discounts, insurance, the transaction status, and other information about the transaction.</li><li><a href="https://developer.paypal.com/api/transaction-search/v1/#definition-definition-payer_info"><code>payer_info</code></a>. The payer information. Includes the PayPal customer account ID and the payer's email address, primary phone number, name, country code, address, and whether the payer is verified or unverified.</li><li><a href="https://developer.paypal.com/api/transaction-search/v1/#definition-shipping_info"><code>shipping_info</code></a>. The shipping information. Includes the recipient's name, the shipping method for this order, the shipping address for this order, and the secondary address associated with this order.</li><li><a href="https://developer.paypal.com/api/transaction-search/v1/#definition-auction_info"><code>auction_info</code></a>. The auction information. Includes the name of the auction site, the auction site URL, the ID of the customer who makes the purchase in the auction, and the date and time when the auction closes.</li><li><a href="https://developer.paypal.com/api/transaction-search/v1/#definition-cart_info"><code>cart_info</code></a>. The cart information. Includes an array of item details, whether the item amount or the shipping amount already includes tax, and the ID of the invoice for PayPal-generated invoices.</li><li><a href="https://developer.paypal.com/api/transaction-search/v1/#definition-incentive_info"><code>incentive_info</code></a>. An array of incentive detail objects. Each object includes the incentive, such as a special offer or coupon, the incentive amount, and the incentive program code that identifies a merchant loyalty or incentive program.</li><li><a href="https://developer.paypal.com/api/transaction-search/v1/#definition-store_info"><code>store_info</code></a>. The store information. Includes the ID of the merchant store and the terminal ID for the checkout stand in the merchant store.</li></ul>
     * @param  string  $startDate (Required) Filters the transactions in the response by a start date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). Seconds are required. Fractional seconds are optional.
     * @param  string  $endDate (Required) Filters the transactions in the response by an end date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). Seconds are required. Fractional seconds are optional. The maximum supported range is 31 days.
     * @param  string  $transactionId Filters the transactions in the response by a PayPal transaction ID. A valid transaction ID is 17 characters long, except for an <a href="https://developer.paypal.com/api/payments/v1/#definition-order>order ID</a>, which is 19 characters long.<blockquote><strong>Note:</strong> A transaction ID is not unique in the reporting system. The response can list two transactions with the same ID. One transaction can be balance affecting while the other is non-balance affecting.</blockquote>
     * @param  string  $transactionType Filters the transactions in the response by a PayPal transaction event code. See [Transaction event codes](https://developer.paypal.com/docs/integration/direct/transaction-search/transaction-event-codes/).
     * @param  string  $transactionStatus Filters the transactions in the response by a PayPal transaction status code. Value is:<table><thead><tr><th>Status&nbsp;code</th><th>Description</th></tr></thead><tbody><tr><td><code>D</code></td><td>PayPal or merchant rules denied the transaction.</td></tr><tr><td><code>P</code></td><td>The transaction is pending. The transaction was created but waits for another payment process to complete, such as an ACH transaction, before the status changes to <code>S</code>.</td></tr><tr><td><code>S</code></td><td>The transaction successfully completed without a denial and after any pending statuses.</td></tr><tr><td><code>V</code></td><td>A successful transaction was reversed and funds were refunded to the original sender.</td></tr></tbody></table>
     * @param  string  $transactionAmount Filters the transactions in the response by a gross transaction amount range. Specify the range as `<start-range> TO <end-range>`, where `<start-range>` is the lower limit of the gross PayPal transaction amount and `<end-range>` is the upper limit of the gross transaction amount. Specify the amounts in lower denominations. For example, to search for transactions from $5.00 to $10.05, specify `[500 TO 1005]`.<blockquote><strong>Note:</strong>The values must be URL encoded.</blockquote>
     * @param  string  $transactionCurrency Filters the transactions in the response by a [three-character ISO-4217 currency code](https://developer.paypal.com/api/rest/reference/currency-codes/) for the PayPal transaction currency.
     * @param  string  $paymentInstrumentType Filters the transactions in the response by a payment instrument type. Value is either:<ul><li><code>CREDITCARD</code>. Returns a direct credit card transaction with a corresponding value.</li><li><code>DEBITCARD</code>. Returns a debit card transaction with a corresponding value.</li></ul>If you omit this parameter, the API does not apply this filter.
     * @param  string  $balanceAffectingRecordsOnly Indicates whether the response includes only balance-impacting transactions or all transactions. Value is either:<ul><li><code>Y</code>. The default. The response includes only balance transactions.</li><li><code>N</code>. The response includes all transactions.</li></ul>
     * @param  string  $terminalId Filters the transactions in the response by a terminal ID.
     * @param  string  $storeId Filters the transactions in the response by a store ID.
     * @param  string  $page The zero-relative start index of the entire list of items that are returned in the response. So, the combination of `page=1` and `page_size=20` returns the first 20 items.
     * @param  string  $pageSize The number of items to return in the response. So, the combination of `page=1` and `page_size=20` returns the first 20 items. The combination of `page=2` and `page_size=20` returns the next 20 items.
     */
    public function listTransactions(
        ?string $fields,
        ?string $startDate,
        ?string $endDate,
        ?string $transactionId,
        ?string $transactionType,
        ?string $transactionStatus,
        ?string $transactionAmount,
        ?string $transactionCurrency,
        ?string $paymentInstrumentType,
        ?string $balanceAffectingRecordsOnly,
        ?string $terminalId,
        ?string $storeId,
        ?string $page,
        ?string $pageSize,
    ): Response {
        return $this->connector->send(new ListTransactions($fields, $startDate, $endDate, $transactionId, $transactionType, $transactionStatus, $transactionAmount, $transactionCurrency, $paymentInstrumentType, $balanceAffectingRecordsOnly, $terminalId, $storeId, $page, $pageSize));
    }

    /**
     * @param  string  $asOfTime List balances in the response at the date time provided, will return the last refreshed balance in the system when not provided.
     * @param  string  $currencyCode Filters the transactions in the response by a [three-character ISO-4217 currency code](https://developer.paypal.com/docs/api/reference/currency-codes/) for the PayPal transaction currency.
     * @param  string  $includeCryptoCurrencies Indicates whether the response list balances including crypto transactions. Value is either:<ul><li><code>false</code>. The default. The response doesn't include crypto transactions.</li><li><code>true</code>. The response also includes crypto transactions.</li></ul>
     */
    public function listAllBalances(?string $asOfTime, ?string $currencyCode, ?string $includeCryptoCurrencies): Response
    {
        return $this->connector->send(new ListAllBalances($asOfTime, $currencyCode, $includeCryptoCurrencies));
    }
}
