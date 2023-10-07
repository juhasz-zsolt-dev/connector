<?php

namespace App\Http\Integrations\Stripe\Resource;

use App\Http\Integrations\Stripe\Requests\Invoices\CreateInvoice;
use App\Http\Integrations\Stripe\Requests\Invoices\DeleteInvoice;
use App\Http\Integrations\Stripe\Requests\Invoices\FinalizeInvoice;
use App\Http\Integrations\Stripe\Requests\Invoices\ListAllInvoices;
use App\Http\Integrations\Stripe\Requests\Invoices\MarkInvoiceAsUncollectable;
use App\Http\Integrations\Stripe\Requests\Invoices\PayInvoice;
use App\Http\Integrations\Stripe\Requests\Invoices\RetrieveInvoice;
use App\Http\Integrations\Stripe\Requests\Invoices\RetrieveInvoiceLineItems;
use App\Http\Integrations\Stripe\Requests\Invoices\RetrieveUpcomingInvoice;
use App\Http\Integrations\Stripe\Requests\Invoices\RetrieveUpcomingInvoiceLineItems;
use App\Http\Integrations\Stripe\Requests\Invoices\SearchInvoices;
use App\Http\Integrations\Stripe\Requests\Invoices\SendInvoiceForManualPayment;
use App\Http\Integrations\Stripe\Requests\Invoices\UpdateInvoice;
use App\Http\Integrations\Stripe\Requests\Invoices\VoidInvoice;
use App\Http\Integrations\Stripe\Resource;
use Saloon\Http\Response;

class Invoices extends Resource
{
	/**
	 * @param string $collectionMethod The collection method of the invoice to retrieve. Either `charge_automatically` or `send_invoice`.
	 * @param string $createdgt
	 * @param string $createdgte
	 * @param string $createdlt
	 * @param string $createdlte
	 * @param string $customer Only return invoices for the customer specified by this customer ID.
	 * @param string $dueDategt
	 * @param string $dueDategte
	 * @param string $dueDatelt
	 * @param string $dueDatelte
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $status The status of the invoice, one of `draft`, `open`, `paid`, `uncollectible`, or `void`. [Learn more](https://stripe.com/docs/billing/invoices/workflow#workflow-overview)
	 * @param string $subscription Only return invoices for the subscription specified by this subscription ID.
	 */
	public function listAllInvoices(
		?string $collectionMethod,
		?string $createdgt,
		?string $createdgte,
		?string $createdlt,
		?string $createdlte,
		?string $customer,
		?string $dueDategt,
		?string $dueDategte,
		?string $dueDatelt,
		?string $dueDatelte,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
		?string $status,
		?string $subscription,
	): Response
	{
		return $this->connector->send(new ListAllInvoices($collectionMethod, $createdgt, $createdgte, $createdlt, $createdlte, $customer, $dueDategt, $dueDategte, $dueDatelt, $dueDatelte, $endingBefore, $expand0, $expand1, $limit, $startingAfter, $status, $subscription));
	}


	public function createInvoice(): Response
	{
		return $this->connector->send(new CreateInvoice());
	}


	/**
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $page A cursor for pagination across multiple pages of results. Don't include this parameter on the first call. Use the next_page value returned in a previous response to request subsequent results.
	 * @param string $query (Required) The search query string. See [search query language](https://stripe.com/docs/search#search-query-language) and the list of supported [query fields for invoices](https://stripe.com/docs/search#query-fields-for-invoices).
	 */
	public function searchInvoices(
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $page,
		?string $query,
	): Response
	{
		return $this->connector->send(new SearchInvoices($expand0, $expand1, $limit, $page, $query));
	}


	/**
	 * @param string $automaticTaxenabled Settings for automatic tax lookup for this invoice preview.
	 * @param string $coupon The code of the coupon to apply. If `subscription` or `subscription_items` is provided, the invoice returned will preview updating or creating a subscription with that coupon. Otherwise, it will preview applying that coupon to the customer for the next upcoming invoice from among the customer's subscriptions. The invoice can be previewed without a coupon by passing this value as an empty string.
	 * @param string $currency The currency to preview this invoice in. Defaults to that of `customer` if not specified.
	 * @param string $customer The identifier of the customer whose upcoming invoice you'd like to retrieve.
	 * @param string $customerDetailsaddresscity Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddresscountry Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddressline1 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddressline2 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddresspostalCode Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddressstate Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddresscity Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddresscountry Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddressline1 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddressline2 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddresspostalCode Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddressstate Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingname Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingphone Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxipAddress Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxExempt Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxIds0type Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxIds0value Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxIds1type Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxIds1value Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $discounts0coupon The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param string $discounts0discount The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param string $discounts1coupon The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param string $discounts1discount The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $invoiceItems0amount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0currency List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0description List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discountable List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discounts0coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discounts0discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discounts1coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discounts1discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0invoiceitem List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0metadata List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0periodend List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0periodstart List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0price List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDatacurrency List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDataproduct List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDatataxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDataunitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDataunitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0quantity List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0taxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0taxCode List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0taxRates0 List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0taxRates1 List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0unitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0unitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1amount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1currency List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1description List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discountable List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discounts0coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discounts0discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discounts1coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discounts1discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1invoiceitem List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1metadata List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1periodend List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1periodstart List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1price List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDatacurrency List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDataproduct List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDatataxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDataunitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDataunitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1quantity List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1taxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1taxCode List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1taxRates0 List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1taxRates1 List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1unitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1unitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $schedule The identifier of the unstarted schedule whose upcoming invoice you'd like to retrieve. Cannot be used with subscription or subscription fields.
	 * @param string $subscription The identifier of the subscription for which you'd like to retrieve the upcoming invoice. If not provided, but a `subscription_items` is provided, you will preview creating a subscription with those items. If neither `subscription` nor `subscription_items` is provided, you will retrieve the next upcoming invoice from among the customer's subscriptions.
	 * @param string $subscriptionCancelAtPeriodEnd Boolean indicating whether this subscription should cancel at the end of the current period.
	 * @param string $subscriptionCancelNow This simulates the subscription being canceled or expired immediately.
	 * @param string $subscriptionDefaultTaxRates0 If provided, the invoice returned will preview updating or creating a subscription with these default tax rates. The default tax rates will apply to any line item that does not have `tax_rates` set.
	 * @param string $subscriptionDefaultTaxRates1 If provided, the invoice returned will preview updating or creating a subscription with these default tax rates. The default tax rates will apply to any line item that does not have `tax_rates` set.
	 * @param string $subscriptionItems0billingThresholdsusageGte A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0clearUsage A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0deleted A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0id A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0metadata A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0price A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDatacurrency A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDataproduct A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDatarecurringinterval A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDatarecurringintervalCount A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDatataxBehavior A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDataunitAmount A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDataunitAmountDecimal A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0quantity A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0taxRates0 A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0taxRates1 A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1billingThresholdsusageGte A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1clearUsage A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1deleted A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1id A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1metadata A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1price A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDatacurrency A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDataproduct A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDatarecurringinterval A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDatarecurringintervalCount A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDatataxBehavior A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDataunitAmount A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDataunitAmountDecimal A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1quantity A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1taxRates0 A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1taxRates1 A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionProrationBehavior Determines how to handle [prorations](https://stripe.com/docs/subscriptions/billing-cycle#prorations) when the billing cycle changes (e.g., when switching plans, resetting `billing_cycle_anchor=now`, or starting a trial), or if an item's `quantity` changes.
	 * @param string $subscriptionProrationDate If previewing an update to a subscription, and doing proration, `subscription_proration_date` forces the proration to be calculated as though the update was done at the specified time. The time given must be within the current subscription period, and cannot be before the subscription was on its current plan. If set, `subscription`, and one of `subscription_items`, or `subscription_trial_end` are required. Also, `subscription_proration_behavior` cannot be set to 'none'.
	 * @param string $subscriptionStartDate Date a subscription is intended to start (can be future or past)
	 * @param string $subscriptionTrialFromPlan Indicates if a plan's `trial_period_days` should be applied to the subscription. Setting `subscription_trial_end` per subscription is preferred, and this defaults to `false`. Setting this flag to `true` together with `subscription_trial_end` is not allowed. See [Using trial periods on subscriptions](https://stripe.com/docs/billing/subscriptions/trials) to learn more.
	 */
	public function retrieveUpcomingInvoice(
		?string $automaticTaxenabled,
		?string $coupon,
		?string $currency,
		?string $customer,
		?string $customerDetailsaddresscity,
		?string $customerDetailsaddresscountry,
		?string $customerDetailsaddressline1,
		?string $customerDetailsaddressline2,
		?string $customerDetailsaddresspostalCode,
		?string $customerDetailsaddressstate,
		?string $customerDetailsshippingaddresscity,
		?string $customerDetailsshippingaddresscountry,
		?string $customerDetailsshippingaddressline1,
		?string $customerDetailsshippingaddressline2,
		?string $customerDetailsshippingaddresspostalCode,
		?string $customerDetailsshippingaddressstate,
		?string $customerDetailsshippingname,
		?string $customerDetailsshippingphone,
		?string $customerDetailstaxipAddress,
		?string $customerDetailstaxExempt,
		?string $customerDetailstaxIds0type,
		?string $customerDetailstaxIds0value,
		?string $customerDetailstaxIds1type,
		?string $customerDetailstaxIds1value,
		?string $discounts0coupon,
		?string $discounts0discount,
		?string $discounts1coupon,
		?string $discounts1discount,
		?string $expand0,
		?string $expand1,
		?string $invoiceItems0amount,
		?string $invoiceItems0currency,
		?string $invoiceItems0description,
		?string $invoiceItems0discountable,
		?string $invoiceItems0discounts0coupon,
		?string $invoiceItems0discounts0discount,
		?string $invoiceItems0discounts1coupon,
		?string $invoiceItems0discounts1discount,
		?string $invoiceItems0invoiceitem,
		?string $invoiceItems0metadata,
		?string $invoiceItems0periodend,
		?string $invoiceItems0periodstart,
		?string $invoiceItems0price,
		?string $invoiceItems0priceDatacurrency,
		?string $invoiceItems0priceDataproduct,
		?string $invoiceItems0priceDatataxBehavior,
		?string $invoiceItems0priceDataunitAmount,
		?string $invoiceItems0priceDataunitAmountDecimal,
		?string $invoiceItems0quantity,
		?string $invoiceItems0taxBehavior,
		?string $invoiceItems0taxCode,
		?string $invoiceItems0taxRates0,
		?string $invoiceItems0taxRates1,
		?string $invoiceItems0unitAmount,
		?string $invoiceItems0unitAmountDecimal,
		?string $invoiceItems1amount,
		?string $invoiceItems1currency,
		?string $invoiceItems1description,
		?string $invoiceItems1discountable,
		?string $invoiceItems1discounts0coupon,
		?string $invoiceItems1discounts0discount,
		?string $invoiceItems1discounts1coupon,
		?string $invoiceItems1discounts1discount,
		?string $invoiceItems1invoiceitem,
		?string $invoiceItems1metadata,
		?string $invoiceItems1periodend,
		?string $invoiceItems1periodstart,
		?string $invoiceItems1price,
		?string $invoiceItems1priceDatacurrency,
		?string $invoiceItems1priceDataproduct,
		?string $invoiceItems1priceDatataxBehavior,
		?string $invoiceItems1priceDataunitAmount,
		?string $invoiceItems1priceDataunitAmountDecimal,
		?string $invoiceItems1quantity,
		?string $invoiceItems1taxBehavior,
		?string $invoiceItems1taxCode,
		?string $invoiceItems1taxRates0,
		?string $invoiceItems1taxRates1,
		?string $invoiceItems1unitAmount,
		?string $invoiceItems1unitAmountDecimal,
		?string $schedule,
		?string $subscription,
		?string $subscriptionCancelAtPeriodEnd,
		?string $subscriptionCancelNow,
		?string $subscriptionDefaultTaxRates0,
		?string $subscriptionDefaultTaxRates1,
		?string $subscriptionItems0billingThresholdsusageGte,
		?string $subscriptionItems0clearUsage,
		?string $subscriptionItems0deleted,
		?string $subscriptionItems0id,
		?string $subscriptionItems0metadata,
		?string $subscriptionItems0price,
		?string $subscriptionItems0priceDatacurrency,
		?string $subscriptionItems0priceDataproduct,
		?string $subscriptionItems0priceDatarecurringinterval,
		?string $subscriptionItems0priceDatarecurringintervalCount,
		?string $subscriptionItems0priceDatataxBehavior,
		?string $subscriptionItems0priceDataunitAmount,
		?string $subscriptionItems0priceDataunitAmountDecimal,
		?string $subscriptionItems0quantity,
		?string $subscriptionItems0taxRates0,
		?string $subscriptionItems0taxRates1,
		?string $subscriptionItems1billingThresholdsusageGte,
		?string $subscriptionItems1clearUsage,
		?string $subscriptionItems1deleted,
		?string $subscriptionItems1id,
		?string $subscriptionItems1metadata,
		?string $subscriptionItems1price,
		?string $subscriptionItems1priceDatacurrency,
		?string $subscriptionItems1priceDataproduct,
		?string $subscriptionItems1priceDatarecurringinterval,
		?string $subscriptionItems1priceDatarecurringintervalCount,
		?string $subscriptionItems1priceDatataxBehavior,
		?string $subscriptionItems1priceDataunitAmount,
		?string $subscriptionItems1priceDataunitAmountDecimal,
		?string $subscriptionItems1quantity,
		?string $subscriptionItems1taxRates0,
		?string $subscriptionItems1taxRates1,
		?string $subscriptionProrationBehavior,
		?string $subscriptionProrationDate,
		?string $subscriptionStartDate,
		?string $subscriptionTrialFromPlan,
	): Response
	{
		return $this->connector->send(new RetrieveUpcomingInvoice($automaticTaxenabled, $coupon, $currency, $customer, $customerDetailsaddresscity, $customerDetailsaddresscountry, $customerDetailsaddressline1, $customerDetailsaddressline2, $customerDetailsaddresspostalCode, $customerDetailsaddressstate, $customerDetailsshippingaddresscity, $customerDetailsshippingaddresscountry, $customerDetailsshippingaddressline1, $customerDetailsshippingaddressline2, $customerDetailsshippingaddresspostalCode, $customerDetailsshippingaddressstate, $customerDetailsshippingname, $customerDetailsshippingphone, $customerDetailstaxipAddress, $customerDetailstaxExempt, $customerDetailstaxIds0type, $customerDetailstaxIds0value, $customerDetailstaxIds1type, $customerDetailstaxIds1value, $discounts0coupon, $discounts0discount, $discounts1coupon, $discounts1discount, $expand0, $expand1, $invoiceItems0amount, $invoiceItems0currency, $invoiceItems0description, $invoiceItems0discountable, $invoiceItems0discounts0coupon, $invoiceItems0discounts0discount, $invoiceItems0discounts1coupon, $invoiceItems0discounts1discount, $invoiceItems0invoiceitem, $invoiceItems0metadata, $invoiceItems0periodend, $invoiceItems0periodstart, $invoiceItems0price, $invoiceItems0priceDatacurrency, $invoiceItems0priceDataproduct, $invoiceItems0priceDatataxBehavior, $invoiceItems0priceDataunitAmount, $invoiceItems0priceDataunitAmountDecimal, $invoiceItems0quantity, $invoiceItems0taxBehavior, $invoiceItems0taxCode, $invoiceItems0taxRates0, $invoiceItems0taxRates1, $invoiceItems0unitAmount, $invoiceItems0unitAmountDecimal, $invoiceItems1amount, $invoiceItems1currency, $invoiceItems1description, $invoiceItems1discountable, $invoiceItems1discounts0coupon, $invoiceItems1discounts0discount, $invoiceItems1discounts1coupon, $invoiceItems1discounts1discount, $invoiceItems1invoiceitem, $invoiceItems1metadata, $invoiceItems1periodend, $invoiceItems1periodstart, $invoiceItems1price, $invoiceItems1priceDatacurrency, $invoiceItems1priceDataproduct, $invoiceItems1priceDatataxBehavior, $invoiceItems1priceDataunitAmount, $invoiceItems1priceDataunitAmountDecimal, $invoiceItems1quantity, $invoiceItems1taxBehavior, $invoiceItems1taxCode, $invoiceItems1taxRates0, $invoiceItems1taxRates1, $invoiceItems1unitAmount, $invoiceItems1unitAmountDecimal, $schedule, $subscription, $subscriptionCancelAtPeriodEnd, $subscriptionCancelNow, $subscriptionDefaultTaxRates0, $subscriptionDefaultTaxRates1, $subscriptionItems0billingThresholdsusageGte, $subscriptionItems0clearUsage, $subscriptionItems0deleted, $subscriptionItems0id, $subscriptionItems0metadata, $subscriptionItems0price, $subscriptionItems0priceDatacurrency, $subscriptionItems0priceDataproduct, $subscriptionItems0priceDatarecurringinterval, $subscriptionItems0priceDatarecurringintervalCount, $subscriptionItems0priceDatataxBehavior, $subscriptionItems0priceDataunitAmount, $subscriptionItems0priceDataunitAmountDecimal, $subscriptionItems0quantity, $subscriptionItems0taxRates0, $subscriptionItems0taxRates1, $subscriptionItems1billingThresholdsusageGte, $subscriptionItems1clearUsage, $subscriptionItems1deleted, $subscriptionItems1id, $subscriptionItems1metadata, $subscriptionItems1price, $subscriptionItems1priceDatacurrency, $subscriptionItems1priceDataproduct, $subscriptionItems1priceDatarecurringinterval, $subscriptionItems1priceDatarecurringintervalCount, $subscriptionItems1priceDatataxBehavior, $subscriptionItems1priceDataunitAmount, $subscriptionItems1priceDataunitAmountDecimal, $subscriptionItems1quantity, $subscriptionItems1taxRates0, $subscriptionItems1taxRates1, $subscriptionProrationBehavior, $subscriptionProrationDate, $subscriptionStartDate, $subscriptionTrialFromPlan));
	}


	/**
	 * @param string $automaticTaxenabled Settings for automatic tax lookup for this invoice preview.
	 * @param string $coupon The code of the coupon to apply. If `subscription` or `subscription_items` is provided, the invoice returned will preview updating or creating a subscription with that coupon. Otherwise, it will preview applying that coupon to the customer for the next upcoming invoice from among the customer's subscriptions. The invoice can be previewed without a coupon by passing this value as an empty string.
	 * @param string $currency The currency to preview this invoice in. Defaults to that of `customer` if not specified.
	 * @param string $customer The identifier of the customer whose upcoming invoice you'd like to retrieve.
	 * @param string $customerDetailsaddresscity Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddresscountry Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddressline1 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddressline2 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddresspostalCode Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsaddressstate Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddresscity Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddresscountry Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddressline1 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddressline2 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddresspostalCode Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingaddressstate Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingname Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailsshippingphone Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxipAddress Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxExempt Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxIds0type Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxIds0value Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxIds1type Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $customerDetailstaxIds1value Details about the customer you want to invoice or overrides for an existing customer.
	 * @param string $discounts0coupon The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param string $discounts0discount The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param string $discounts1coupon The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param string $discounts1discount The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $invoiceItems0amount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0currency List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0description List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discountable List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discounts0coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discounts0discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discounts1coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0discounts1discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0invoiceitem List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0metadata List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0periodend List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0periodstart List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0price List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDatacurrency List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDataproduct List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDatataxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDataunitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0priceDataunitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0quantity List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0taxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0taxCode List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0taxRates0 List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0taxRates1 List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0unitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems0unitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1amount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1currency List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1description List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discountable List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discounts0coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discounts0discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discounts1coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1discounts1discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1invoiceitem List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1metadata List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1periodend List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1periodstart List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1price List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDatacurrency List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDataproduct List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDatataxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDataunitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1priceDataunitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1quantity List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1taxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1taxCode List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1taxRates0 List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1taxRates1 List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1unitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $invoiceItems1unitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $schedule The identifier of the unstarted schedule whose upcoming invoice you'd like to retrieve. Cannot be used with subscription or subscription fields.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 * @param string $subscription The identifier of the subscription for which you'd like to retrieve the upcoming invoice. If not provided, but a `subscription_items` is provided, you will preview creating a subscription with those items. If neither `subscription` nor `subscription_items` is provided, you will retrieve the next upcoming invoice from among the customer's subscriptions.
	 * @param string $subscriptionCancelAtPeriodEnd Boolean indicating whether this subscription should cancel at the end of the current period.
	 * @param string $subscriptionCancelNow This simulates the subscription being canceled or expired immediately.
	 * @param string $subscriptionDefaultTaxRates0 If provided, the invoice returned will preview updating or creating a subscription with these default tax rates. The default tax rates will apply to any line item that does not have `tax_rates` set.
	 * @param string $subscriptionDefaultTaxRates1 If provided, the invoice returned will preview updating or creating a subscription with these default tax rates. The default tax rates will apply to any line item that does not have `tax_rates` set.
	 * @param string $subscriptionItems0billingThresholdsusageGte A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0clearUsage A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0deleted A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0id A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0metadata A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0price A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDatacurrency A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDataproduct A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDatarecurringinterval A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDatarecurringintervalCount A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDatataxBehavior A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDataunitAmount A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0priceDataunitAmountDecimal A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0quantity A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0taxRates0 A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems0taxRates1 A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1billingThresholdsusageGte A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1clearUsage A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1deleted A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1id A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1metadata A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1price A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDatacurrency A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDataproduct A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDatarecurringinterval A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDatarecurringintervalCount A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDatataxBehavior A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDataunitAmount A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1priceDataunitAmountDecimal A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1quantity A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1taxRates0 A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionItems1taxRates1 A list of up to 20 subscription items, each with an attached price.
	 * @param string $subscriptionProrationBehavior Determines how to handle [prorations](https://stripe.com/docs/subscriptions/billing-cycle#prorations) when the billing cycle changes (e.g., when switching plans, resetting `billing_cycle_anchor=now`, or starting a trial), or if an item's `quantity` changes.
	 * @param string $subscriptionProrationDate If previewing an update to a subscription, and doing proration, `subscription_proration_date` forces the proration to be calculated as though the update was done at the specified time. The time given must be within the current subscription period, and cannot be before the subscription was on its current plan. If set, `subscription`, and one of `subscription_items`, or `subscription_trial_end` are required. Also, `subscription_proration_behavior` cannot be set to 'none'.
	 * @param string $subscriptionStartDate Date a subscription is intended to start (can be future or past)
	 * @param string $subscriptionTrialFromPlan Indicates if a plan's `trial_period_days` should be applied to the subscription. Setting `subscription_trial_end` per subscription is preferred, and this defaults to `false`. Setting this flag to `true` together with `subscription_trial_end` is not allowed. See [Using trial periods on subscriptions](https://stripe.com/docs/billing/subscriptions/trials) to learn more.
	 */
	public function retrieveUpcomingInvoiceLineItems(
		?string $automaticTaxenabled,
		?string $coupon,
		?string $currency,
		?string $customer,
		?string $customerDetailsaddresscity,
		?string $customerDetailsaddresscountry,
		?string $customerDetailsaddressline1,
		?string $customerDetailsaddressline2,
		?string $customerDetailsaddresspostalCode,
		?string $customerDetailsaddressstate,
		?string $customerDetailsshippingaddresscity,
		?string $customerDetailsshippingaddresscountry,
		?string $customerDetailsshippingaddressline1,
		?string $customerDetailsshippingaddressline2,
		?string $customerDetailsshippingaddresspostalCode,
		?string $customerDetailsshippingaddressstate,
		?string $customerDetailsshippingname,
		?string $customerDetailsshippingphone,
		?string $customerDetailstaxipAddress,
		?string $customerDetailstaxExempt,
		?string $customerDetailstaxIds0type,
		?string $customerDetailstaxIds0value,
		?string $customerDetailstaxIds1type,
		?string $customerDetailstaxIds1value,
		?string $discounts0coupon,
		?string $discounts0discount,
		?string $discounts1coupon,
		?string $discounts1discount,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $invoiceItems0amount,
		?string $invoiceItems0currency,
		?string $invoiceItems0description,
		?string $invoiceItems0discountable,
		?string $invoiceItems0discounts0coupon,
		?string $invoiceItems0discounts0discount,
		?string $invoiceItems0discounts1coupon,
		?string $invoiceItems0discounts1discount,
		?string $invoiceItems0invoiceitem,
		?string $invoiceItems0metadata,
		?string $invoiceItems0periodend,
		?string $invoiceItems0periodstart,
		?string $invoiceItems0price,
		?string $invoiceItems0priceDatacurrency,
		?string $invoiceItems0priceDataproduct,
		?string $invoiceItems0priceDatataxBehavior,
		?string $invoiceItems0priceDataunitAmount,
		?string $invoiceItems0priceDataunitAmountDecimal,
		?string $invoiceItems0quantity,
		?string $invoiceItems0taxBehavior,
		?string $invoiceItems0taxCode,
		?string $invoiceItems0taxRates0,
		?string $invoiceItems0taxRates1,
		?string $invoiceItems0unitAmount,
		?string $invoiceItems0unitAmountDecimal,
		?string $invoiceItems1amount,
		?string $invoiceItems1currency,
		?string $invoiceItems1description,
		?string $invoiceItems1discountable,
		?string $invoiceItems1discounts0coupon,
		?string $invoiceItems1discounts0discount,
		?string $invoiceItems1discounts1coupon,
		?string $invoiceItems1discounts1discount,
		?string $invoiceItems1invoiceitem,
		?string $invoiceItems1metadata,
		?string $invoiceItems1periodend,
		?string $invoiceItems1periodstart,
		?string $invoiceItems1price,
		?string $invoiceItems1priceDatacurrency,
		?string $invoiceItems1priceDataproduct,
		?string $invoiceItems1priceDatataxBehavior,
		?string $invoiceItems1priceDataunitAmount,
		?string $invoiceItems1priceDataunitAmountDecimal,
		?string $invoiceItems1quantity,
		?string $invoiceItems1taxBehavior,
		?string $invoiceItems1taxCode,
		?string $invoiceItems1taxRates0,
		?string $invoiceItems1taxRates1,
		?string $invoiceItems1unitAmount,
		?string $invoiceItems1unitAmountDecimal,
		?string $limit,
		?string $schedule,
		?string $startingAfter,
		?string $subscription,
		?string $subscriptionCancelAtPeriodEnd,
		?string $subscriptionCancelNow,
		?string $subscriptionDefaultTaxRates0,
		?string $subscriptionDefaultTaxRates1,
		?string $subscriptionItems0billingThresholdsusageGte,
		?string $subscriptionItems0clearUsage,
		?string $subscriptionItems0deleted,
		?string $subscriptionItems0id,
		?string $subscriptionItems0metadata,
		?string $subscriptionItems0price,
		?string $subscriptionItems0priceDatacurrency,
		?string $subscriptionItems0priceDataproduct,
		?string $subscriptionItems0priceDatarecurringinterval,
		?string $subscriptionItems0priceDatarecurringintervalCount,
		?string $subscriptionItems0priceDatataxBehavior,
		?string $subscriptionItems0priceDataunitAmount,
		?string $subscriptionItems0priceDataunitAmountDecimal,
		?string $subscriptionItems0quantity,
		?string $subscriptionItems0taxRates0,
		?string $subscriptionItems0taxRates1,
		?string $subscriptionItems1billingThresholdsusageGte,
		?string $subscriptionItems1clearUsage,
		?string $subscriptionItems1deleted,
		?string $subscriptionItems1id,
		?string $subscriptionItems1metadata,
		?string $subscriptionItems1price,
		?string $subscriptionItems1priceDatacurrency,
		?string $subscriptionItems1priceDataproduct,
		?string $subscriptionItems1priceDatarecurringinterval,
		?string $subscriptionItems1priceDatarecurringintervalCount,
		?string $subscriptionItems1priceDatataxBehavior,
		?string $subscriptionItems1priceDataunitAmount,
		?string $subscriptionItems1priceDataunitAmountDecimal,
		?string $subscriptionItems1quantity,
		?string $subscriptionItems1taxRates0,
		?string $subscriptionItems1taxRates1,
		?string $subscriptionProrationBehavior,
		?string $subscriptionProrationDate,
		?string $subscriptionStartDate,
		?string $subscriptionTrialFromPlan,
	): Response
	{
		return $this->connector->send(new RetrieveUpcomingInvoiceLineItems($automaticTaxenabled, $coupon, $currency, $customer, $customerDetailsaddresscity, $customerDetailsaddresscountry, $customerDetailsaddressline1, $customerDetailsaddressline2, $customerDetailsaddresspostalCode, $customerDetailsaddressstate, $customerDetailsshippingaddresscity, $customerDetailsshippingaddresscountry, $customerDetailsshippingaddressline1, $customerDetailsshippingaddressline2, $customerDetailsshippingaddresspostalCode, $customerDetailsshippingaddressstate, $customerDetailsshippingname, $customerDetailsshippingphone, $customerDetailstaxipAddress, $customerDetailstaxExempt, $customerDetailstaxIds0type, $customerDetailstaxIds0value, $customerDetailstaxIds1type, $customerDetailstaxIds1value, $discounts0coupon, $discounts0discount, $discounts1coupon, $discounts1discount, $endingBefore, $expand0, $expand1, $invoiceItems0amount, $invoiceItems0currency, $invoiceItems0description, $invoiceItems0discountable, $invoiceItems0discounts0coupon, $invoiceItems0discounts0discount, $invoiceItems0discounts1coupon, $invoiceItems0discounts1discount, $invoiceItems0invoiceitem, $invoiceItems0metadata, $invoiceItems0periodend, $invoiceItems0periodstart, $invoiceItems0price, $invoiceItems0priceDatacurrency, $invoiceItems0priceDataproduct, $invoiceItems0priceDatataxBehavior, $invoiceItems0priceDataunitAmount, $invoiceItems0priceDataunitAmountDecimal, $invoiceItems0quantity, $invoiceItems0taxBehavior, $invoiceItems0taxCode, $invoiceItems0taxRates0, $invoiceItems0taxRates1, $invoiceItems0unitAmount, $invoiceItems0unitAmountDecimal, $invoiceItems1amount, $invoiceItems1currency, $invoiceItems1description, $invoiceItems1discountable, $invoiceItems1discounts0coupon, $invoiceItems1discounts0discount, $invoiceItems1discounts1coupon, $invoiceItems1discounts1discount, $invoiceItems1invoiceitem, $invoiceItems1metadata, $invoiceItems1periodend, $invoiceItems1periodstart, $invoiceItems1price, $invoiceItems1priceDatacurrency, $invoiceItems1priceDataproduct, $invoiceItems1priceDatataxBehavior, $invoiceItems1priceDataunitAmount, $invoiceItems1priceDataunitAmountDecimal, $invoiceItems1quantity, $invoiceItems1taxBehavior, $invoiceItems1taxCode, $invoiceItems1taxRates0, $invoiceItems1taxRates1, $invoiceItems1unitAmount, $invoiceItems1unitAmountDecimal, $limit, $schedule, $startingAfter, $subscription, $subscriptionCancelAtPeriodEnd, $subscriptionCancelNow, $subscriptionDefaultTaxRates0, $subscriptionDefaultTaxRates1, $subscriptionItems0billingThresholdsusageGte, $subscriptionItems0clearUsage, $subscriptionItems0deleted, $subscriptionItems0id, $subscriptionItems0metadata, $subscriptionItems0price, $subscriptionItems0priceDatacurrency, $subscriptionItems0priceDataproduct, $subscriptionItems0priceDatarecurringinterval, $subscriptionItems0priceDatarecurringintervalCount, $subscriptionItems0priceDatataxBehavior, $subscriptionItems0priceDataunitAmount, $subscriptionItems0priceDataunitAmountDecimal, $subscriptionItems0quantity, $subscriptionItems0taxRates0, $subscriptionItems0taxRates1, $subscriptionItems1billingThresholdsusageGte, $subscriptionItems1clearUsage, $subscriptionItems1deleted, $subscriptionItems1id, $subscriptionItems1metadata, $subscriptionItems1price, $subscriptionItems1priceDatacurrency, $subscriptionItems1priceDataproduct, $subscriptionItems1priceDatarecurringinterval, $subscriptionItems1priceDatarecurringintervalCount, $subscriptionItems1priceDatataxBehavior, $subscriptionItems1priceDataunitAmount, $subscriptionItems1priceDataunitAmountDecimal, $subscriptionItems1quantity, $subscriptionItems1taxRates0, $subscriptionItems1taxRates1, $subscriptionProrationBehavior, $subscriptionProrationDate, $subscriptionStartDate, $subscriptionTrialFromPlan));
	}


	/**
	 * @param string $invoice
	 */
	public function deleteInvoice(string $invoice): Response
	{
		return $this->connector->send(new DeleteInvoice($invoice));
	}


	/**
	 * @param string $invoice
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 */
	public function retrieveInvoice(string $invoice, ?string $expand0, ?string $expand1): Response
	{
		return $this->connector->send(new RetrieveInvoice($invoice, $expand0, $expand1));
	}


	/**
	 * @param string $invoice
	 */
	public function updateInvoice(string $invoice): Response
	{
		return $this->connector->send(new UpdateInvoice($invoice));
	}


	/**
	 * @param string $invoice
	 */
	public function finalizeInvoice(string $invoice): Response
	{
		return $this->connector->send(new FinalizeInvoice($invoice));
	}


	/**
	 * @param string $invoice
	 * @param string $endingBefore A cursor for use in pagination. `ending_before` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, starting with `obj_bar`, your subsequent call can include `ending_before=obj_bar` in order to fetch the previous page of the list.
	 * @param string $expand0 Specifies which fields in the response should be expanded.
	 * @param string $expand1 Specifies which fields in the response should be expanded.
	 * @param string $limit A limit on the number of objects to be returned. Limit can range between 1 and 100, and the default is 10.
	 * @param string $startingAfter A cursor for use in pagination. `starting_after` is an object ID that defines your place in the list. For instance, if you make a list request and receive 100 objects, ending with `obj_foo`, your subsequent call can include `starting_after=obj_foo` in order to fetch the next page of the list.
	 */
	public function retrieveInvoiceLineItems(
		string $invoice,
		?string $endingBefore,
		?string $expand0,
		?string $expand1,
		?string $limit,
		?string $startingAfter,
	): Response
	{
		return $this->connector->send(new RetrieveInvoiceLineItems($invoice, $endingBefore, $expand0, $expand1, $limit, $startingAfter));
	}


	/**
	 * @param string $invoice
	 */
	public function markInvoiceAsUncollectable(string $invoice): Response
	{
		return $this->connector->send(new MarkInvoiceAsUncollectable($invoice));
	}


	/**
	 * @param string $invoice
	 */
	public function payInvoice(string $invoice): Response
	{
		return $this->connector->send(new PayInvoice($invoice));
	}


	/**
	 * @param string $invoice
	 */
	public function sendInvoiceForManualPayment(string $invoice): Response
	{
		return $this->connector->send(new SendInvoiceForManualPayment($invoice));
	}


	/**
	 * @param string $invoice
	 */
	public function voidInvoice(string $invoice): Response
	{
		return $this->connector->send(new VoidInvoice($invoice));
	}
}
