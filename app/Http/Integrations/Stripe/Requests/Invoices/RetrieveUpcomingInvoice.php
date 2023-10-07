<?php

namespace App\Http\Integrations\Stripe\Requests\Invoices;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Retrieve an upcoming invoice
 */
class RetrieveUpcomingInvoice extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/v1/invoices/upcoming";
	}


	/**
	 * @param null|string $automaticTaxenabled Settings for automatic tax lookup for this invoice preview.
	 * @param null|string $coupon The code of the coupon to apply. If `subscription` or `subscription_items` is provided, the invoice returned will preview updating or creating a subscription with that coupon. Otherwise, it will preview applying that coupon to the customer for the next upcoming invoice from among the customer's subscriptions. The invoice can be previewed without a coupon by passing this value as an empty string.
	 * @param null|string $currency The currency to preview this invoice in. Defaults to that of `customer` if not specified.
	 * @param null|string $customer The identifier of the customer whose upcoming invoice you'd like to retrieve.
	 * @param null|string $customerDetailsaddresscity Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsaddresscountry Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsaddressline1 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsaddressline2 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsaddresspostalCode Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsaddressstate Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsshippingaddresscity Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsshippingaddresscountry Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsshippingaddressline1 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsshippingaddressline2 Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsshippingaddresspostalCode Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsshippingaddressstate Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsshippingname Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailsshippingphone Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailstaxipAddress Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailstaxExempt Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailstaxIds0type Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailstaxIds0value Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailstaxIds1type Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $customerDetailstaxIds1value Details about the customer you want to invoice or overrides for an existing customer.
	 * @param null|string $discounts0coupon The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param null|string $discounts0discount The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param null|string $discounts1coupon The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param null|string $discounts1discount The coupons to redeem into discounts for the invoice preview. If not specified, inherits the discount from the customer or subscription. This only works for coupons directly applied to the invoice. To apply a coupon to a subscription, you must use the `coupon` parameter instead. Pass an empty string to avoid inheriting any discounts. To preview the upcoming invoice for a subscription that hasn't been created, use `coupon` instead.
	 * @param null|string $expand0 Specifies which fields in the response should be expanded.
	 * @param null|string $expand1 Specifies which fields in the response should be expanded.
	 * @param null|string $invoiceItems0amount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0currency List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0description List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0discountable List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0discounts0coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0discounts0discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0discounts1coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0discounts1discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0invoiceitem List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0metadata List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0periodend List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0periodstart List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0price List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0priceDatacurrency List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0priceDataproduct List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0priceDatataxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0priceDataunitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0priceDataunitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0quantity List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0taxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0taxCode List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0taxRates0 List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0taxRates1 List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0unitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems0unitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1amount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1currency List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1description List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1discountable List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1discounts0coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1discounts0discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1discounts1coupon List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1discounts1discount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1invoiceitem List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1metadata List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1periodend List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1periodstart List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1price List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1priceDatacurrency List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1priceDataproduct List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1priceDatataxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1priceDataunitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1priceDataunitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1quantity List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1taxBehavior List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1taxCode List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1taxRates0 List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1taxRates1 List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1unitAmount List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $invoiceItems1unitAmountDecimal List of invoice items to add or update in the upcoming invoice preview.
	 * @param null|string $schedule The identifier of the unstarted schedule whose upcoming invoice you'd like to retrieve. Cannot be used with subscription or subscription fields.
	 * @param null|string $subscription The identifier of the subscription for which you'd like to retrieve the upcoming invoice. If not provided, but a `subscription_items` is provided, you will preview creating a subscription with those items. If neither `subscription` nor `subscription_items` is provided, you will retrieve the next upcoming invoice from among the customer's subscriptions.
	 * @param null|string $subscriptionCancelAtPeriodEnd Boolean indicating whether this subscription should cancel at the end of the current period.
	 * @param null|string $subscriptionCancelNow This simulates the subscription being canceled or expired immediately.
	 * @param null|string $subscriptionDefaultTaxRates0 If provided, the invoice returned will preview updating or creating a subscription with these default tax rates. The default tax rates will apply to any line item that does not have `tax_rates` set.
	 * @param null|string $subscriptionDefaultTaxRates1 If provided, the invoice returned will preview updating or creating a subscription with these default tax rates. The default tax rates will apply to any line item that does not have `tax_rates` set.
	 * @param null|string $subscriptionItems0billingThresholdsusageGte A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0clearUsage A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0deleted A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0id A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0metadata A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0price A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0priceDatacurrency A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0priceDataproduct A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0priceDatarecurringinterval A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0priceDatarecurringintervalCount A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0priceDatataxBehavior A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0priceDataunitAmount A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0priceDataunitAmountDecimal A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0quantity A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0taxRates0 A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems0taxRates1 A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1billingThresholdsusageGte A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1clearUsage A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1deleted A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1id A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1metadata A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1price A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1priceDatacurrency A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1priceDataproduct A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1priceDatarecurringinterval A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1priceDatarecurringintervalCount A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1priceDatataxBehavior A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1priceDataunitAmount A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1priceDataunitAmountDecimal A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1quantity A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1taxRates0 A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionItems1taxRates1 A list of up to 20 subscription items, each with an attached price.
	 * @param null|string $subscriptionProrationBehavior Determines how to handle [prorations](https://stripe.com/docs/subscriptions/billing-cycle#prorations) when the billing cycle changes (e.g., when switching plans, resetting `billing_cycle_anchor=now`, or starting a trial), or if an item's `quantity` changes.
	 * @param null|string $subscriptionProrationDate If previewing an update to a subscription, and doing proration, `subscription_proration_date` forces the proration to be calculated as though the update was done at the specified time. The time given must be within the current subscription period, and cannot be before the subscription was on its current plan. If set, `subscription`, and one of `subscription_items`, or `subscription_trial_end` are required. Also, `subscription_proration_behavior` cannot be set to 'none'.
	 * @param null|string $subscriptionStartDate Date a subscription is intended to start (can be future or past)
	 * @param null|string $subscriptionTrialFromPlan Indicates if a plan's `trial_period_days` should be applied to the subscription. Setting `subscription_trial_end` per subscription is preferred, and this defaults to `false`. Setting this flag to `true` together with `subscription_trial_end` is not allowed. See [Using trial periods on subscriptions](https://stripe.com/docs/billing/subscriptions/trials) to learn more.
	 */
	public function __construct(
		protected ?string $automaticTaxenabled = null,
		protected ?string $coupon = null,
		protected ?string $currency = null,
		protected ?string $customer = null,
		protected ?string $customerDetailsaddresscity = null,
		protected ?string $customerDetailsaddresscountry = null,
		protected ?string $customerDetailsaddressline1 = null,
		protected ?string $customerDetailsaddressline2 = null,
		protected ?string $customerDetailsaddresspostalCode = null,
		protected ?string $customerDetailsaddressstate = null,
		protected ?string $customerDetailsshippingaddresscity = null,
		protected ?string $customerDetailsshippingaddresscountry = null,
		protected ?string $customerDetailsshippingaddressline1 = null,
		protected ?string $customerDetailsshippingaddressline2 = null,
		protected ?string $customerDetailsshippingaddresspostalCode = null,
		protected ?string $customerDetailsshippingaddressstate = null,
		protected ?string $customerDetailsshippingname = null,
		protected ?string $customerDetailsshippingphone = null,
		protected ?string $customerDetailstaxipAddress = null,
		protected ?string $customerDetailstaxExempt = null,
		protected ?string $customerDetailstaxIds0type = null,
		protected ?string $customerDetailstaxIds0value = null,
		protected ?string $customerDetailstaxIds1type = null,
		protected ?string $customerDetailstaxIds1value = null,
		protected ?string $discounts0coupon = null,
		protected ?string $discounts0discount = null,
		protected ?string $discounts1coupon = null,
		protected ?string $discounts1discount = null,
		protected ?string $expand0 = null,
		protected ?string $expand1 = null,
		protected ?string $invoiceItems0amount = null,
		protected ?string $invoiceItems0currency = null,
		protected ?string $invoiceItems0description = null,
		protected ?string $invoiceItems0discountable = null,
		protected ?string $invoiceItems0discounts0coupon = null,
		protected ?string $invoiceItems0discounts0discount = null,
		protected ?string $invoiceItems0discounts1coupon = null,
		protected ?string $invoiceItems0discounts1discount = null,
		protected ?string $invoiceItems0invoiceitem = null,
		protected ?string $invoiceItems0metadata = null,
		protected ?string $invoiceItems0periodend = null,
		protected ?string $invoiceItems0periodstart = null,
		protected ?string $invoiceItems0price = null,
		protected ?string $invoiceItems0priceDatacurrency = null,
		protected ?string $invoiceItems0priceDataproduct = null,
		protected ?string $invoiceItems0priceDatataxBehavior = null,
		protected ?string $invoiceItems0priceDataunitAmount = null,
		protected ?string $invoiceItems0priceDataunitAmountDecimal = null,
		protected ?string $invoiceItems0quantity = null,
		protected ?string $invoiceItems0taxBehavior = null,
		protected ?string $invoiceItems0taxCode = null,
		protected ?string $invoiceItems0taxRates0 = null,
		protected ?string $invoiceItems0taxRates1 = null,
		protected ?string $invoiceItems0unitAmount = null,
		protected ?string $invoiceItems0unitAmountDecimal = null,
		protected ?string $invoiceItems1amount = null,
		protected ?string $invoiceItems1currency = null,
		protected ?string $invoiceItems1description = null,
		protected ?string $invoiceItems1discountable = null,
		protected ?string $invoiceItems1discounts0coupon = null,
		protected ?string $invoiceItems1discounts0discount = null,
		protected ?string $invoiceItems1discounts1coupon = null,
		protected ?string $invoiceItems1discounts1discount = null,
		protected ?string $invoiceItems1invoiceitem = null,
		protected ?string $invoiceItems1metadata = null,
		protected ?string $invoiceItems1periodend = null,
		protected ?string $invoiceItems1periodstart = null,
		protected ?string $invoiceItems1price = null,
		protected ?string $invoiceItems1priceDatacurrency = null,
		protected ?string $invoiceItems1priceDataproduct = null,
		protected ?string $invoiceItems1priceDatataxBehavior = null,
		protected ?string $invoiceItems1priceDataunitAmount = null,
		protected ?string $invoiceItems1priceDataunitAmountDecimal = null,
		protected ?string $invoiceItems1quantity = null,
		protected ?string $invoiceItems1taxBehavior = null,
		protected ?string $invoiceItems1taxCode = null,
		protected ?string $invoiceItems1taxRates0 = null,
		protected ?string $invoiceItems1taxRates1 = null,
		protected ?string $invoiceItems1unitAmount = null,
		protected ?string $invoiceItems1unitAmountDecimal = null,
		protected ?string $schedule = null,
		protected ?string $subscription = null,
		protected ?string $subscriptionCancelAtPeriodEnd = null,
		protected ?string $subscriptionCancelNow = null,
		protected ?string $subscriptionDefaultTaxRates0 = null,
		protected ?string $subscriptionDefaultTaxRates1 = null,
		protected ?string $subscriptionItems0billingThresholdsusageGte = null,
		protected ?string $subscriptionItems0clearUsage = null,
		protected ?string $subscriptionItems0deleted = null,
		protected ?string $subscriptionItems0id = null,
		protected ?string $subscriptionItems0metadata = null,
		protected ?string $subscriptionItems0price = null,
		protected ?string $subscriptionItems0priceDatacurrency = null,
		protected ?string $subscriptionItems0priceDataproduct = null,
		protected ?string $subscriptionItems0priceDatarecurringinterval = null,
		protected ?string $subscriptionItems0priceDatarecurringintervalCount = null,
		protected ?string $subscriptionItems0priceDatataxBehavior = null,
		protected ?string $subscriptionItems0priceDataunitAmount = null,
		protected ?string $subscriptionItems0priceDataunitAmountDecimal = null,
		protected ?string $subscriptionItems0quantity = null,
		protected ?string $subscriptionItems0taxRates0 = null,
		protected ?string $subscriptionItems0taxRates1 = null,
		protected ?string $subscriptionItems1billingThresholdsusageGte = null,
		protected ?string $subscriptionItems1clearUsage = null,
		protected ?string $subscriptionItems1deleted = null,
		protected ?string $subscriptionItems1id = null,
		protected ?string $subscriptionItems1metadata = null,
		protected ?string $subscriptionItems1price = null,
		protected ?string $subscriptionItems1priceDatacurrency = null,
		protected ?string $subscriptionItems1priceDataproduct = null,
		protected ?string $subscriptionItems1priceDatarecurringinterval = null,
		protected ?string $subscriptionItems1priceDatarecurringintervalCount = null,
		protected ?string $subscriptionItems1priceDatataxBehavior = null,
		protected ?string $subscriptionItems1priceDataunitAmount = null,
		protected ?string $subscriptionItems1priceDataunitAmountDecimal = null,
		protected ?string $subscriptionItems1quantity = null,
		protected ?string $subscriptionItems1taxRates0 = null,
		protected ?string $subscriptionItems1taxRates1 = null,
		protected ?string $subscriptionProrationBehavior = null,
		protected ?string $subscriptionProrationDate = null,
		protected ?string $subscriptionStartDate = null,
		protected ?string $subscriptionTrialFromPlan = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'automatic_tax[enabled]' => $this->automaticTaxenabled,
			'coupon' => $this->coupon,
			'currency' => $this->currency,
			'customer' => $this->customer,
			'customer_details[address][city]' => $this->customerDetailsaddresscity,
			'customer_details[address][country]' => $this->customerDetailsaddresscountry,
			'customer_details[address][line1]' => $this->customerDetailsaddressline1,
			'customer_details[address][line2]' => $this->customerDetailsaddressline2,
			'customer_details[address][postal_code]' => $this->customerDetailsaddresspostalCode,
			'customer_details[address][state]' => $this->customerDetailsaddressstate,
			'customer_details[shipping][address][city]' => $this->customerDetailsshippingaddresscity,
			'customer_details[shipping][address][country]' => $this->customerDetailsshippingaddresscountry,
			'customer_details[shipping][address][line1]' => $this->customerDetailsshippingaddressline1,
			'customer_details[shipping][address][line2]' => $this->customerDetailsshippingaddressline2,
			'customer_details[shipping][address][postal_code]' => $this->customerDetailsshippingaddresspostalCode,
			'customer_details[shipping][address][state]' => $this->customerDetailsshippingaddressstate,
			'customer_details[shipping][name]' => $this->customerDetailsshippingname,
			'customer_details[shipping][phone]' => $this->customerDetailsshippingphone,
			'customer_details[tax][ip_address]' => $this->customerDetailstaxipAddress,
			'customer_details[tax_exempt]' => $this->customerDetailstaxExempt,
			'customer_details[tax_ids][0][type]' => $this->customerDetailstaxIds0type,
			'customer_details[tax_ids][0][value]' => $this->customerDetailstaxIds0value,
			'customer_details[tax_ids][1][type]' => $this->customerDetailstaxIds1type,
			'customer_details[tax_ids][1][value]' => $this->customerDetailstaxIds1value,
			'discounts[0][coupon]' => $this->discounts0coupon,
			'discounts[0][discount]' => $this->discounts0discount,
			'discounts[1][coupon]' => $this->discounts1coupon,
			'discounts[1][discount]' => $this->discounts1discount,
			'expand[0]' => $this->expand0,
			'expand[1]' => $this->expand1,
			'invoice_items[0][amount]' => $this->invoiceItems0amount,
			'invoice_items[0][currency]' => $this->invoiceItems0currency,
			'invoice_items[0][description]' => $this->invoiceItems0description,
			'invoice_items[0][discountable]' => $this->invoiceItems0discountable,
			'invoice_items[0][discounts][0][coupon]' => $this->invoiceItems0discounts0coupon,
			'invoice_items[0][discounts][0][discount]' => $this->invoiceItems0discounts0discount,
			'invoice_items[0][discounts][1][coupon]' => $this->invoiceItems0discounts1coupon,
			'invoice_items[0][discounts][1][discount]' => $this->invoiceItems0discounts1discount,
			'invoice_items[0][invoiceitem]' => $this->invoiceItems0invoiceitem,
			'invoice_items[0][metadata]' => $this->invoiceItems0metadata,
			'invoice_items[0][period][end]' => $this->invoiceItems0periodend,
			'invoice_items[0][period][start]' => $this->invoiceItems0periodstart,
			'invoice_items[0][price]' => $this->invoiceItems0price,
			'invoice_items[0][price_data][currency]' => $this->invoiceItems0priceDatacurrency,
			'invoice_items[0][price_data][product]' => $this->invoiceItems0priceDataproduct,
			'invoice_items[0][price_data][tax_behavior]' => $this->invoiceItems0priceDatataxBehavior,
			'invoice_items[0][price_data][unit_amount]' => $this->invoiceItems0priceDataunitAmount,
			'invoice_items[0][price_data][unit_amount_decimal]' => $this->invoiceItems0priceDataunitAmountDecimal,
			'invoice_items[0][quantity]' => $this->invoiceItems0quantity,
			'invoice_items[0][tax_behavior]' => $this->invoiceItems0taxBehavior,
			'invoice_items[0][tax_code]' => $this->invoiceItems0taxCode,
			'invoice_items[0][tax_rates][0]' => $this->invoiceItems0taxRates0,
			'invoice_items[0][tax_rates][1]' => $this->invoiceItems0taxRates1,
			'invoice_items[0][unit_amount]' => $this->invoiceItems0unitAmount,
			'invoice_items[0][unit_amount_decimal]' => $this->invoiceItems0unitAmountDecimal,
			'invoice_items[1][amount]' => $this->invoiceItems1amount,
			'invoice_items[1][currency]' => $this->invoiceItems1currency,
			'invoice_items[1][description]' => $this->invoiceItems1description,
			'invoice_items[1][discountable]' => $this->invoiceItems1discountable,
			'invoice_items[1][discounts][0][coupon]' => $this->invoiceItems1discounts0coupon,
			'invoice_items[1][discounts][0][discount]' => $this->invoiceItems1discounts0discount,
			'invoice_items[1][discounts][1][coupon]' => $this->invoiceItems1discounts1coupon,
			'invoice_items[1][discounts][1][discount]' => $this->invoiceItems1discounts1discount,
			'invoice_items[1][invoiceitem]' => $this->invoiceItems1invoiceitem,
			'invoice_items[1][metadata]' => $this->invoiceItems1metadata,
			'invoice_items[1][period][end]' => $this->invoiceItems1periodend,
			'invoice_items[1][period][start]' => $this->invoiceItems1periodstart,
			'invoice_items[1][price]' => $this->invoiceItems1price,
			'invoice_items[1][price_data][currency]' => $this->invoiceItems1priceDatacurrency,
			'invoice_items[1][price_data][product]' => $this->invoiceItems1priceDataproduct,
			'invoice_items[1][price_data][tax_behavior]' => $this->invoiceItems1priceDatataxBehavior,
			'invoice_items[1][price_data][unit_amount]' => $this->invoiceItems1priceDataunitAmount,
			'invoice_items[1][price_data][unit_amount_decimal]' => $this->invoiceItems1priceDataunitAmountDecimal,
			'invoice_items[1][quantity]' => $this->invoiceItems1quantity,
			'invoice_items[1][tax_behavior]' => $this->invoiceItems1taxBehavior,
			'invoice_items[1][tax_code]' => $this->invoiceItems1taxCode,
			'invoice_items[1][tax_rates][0]' => $this->invoiceItems1taxRates0,
			'invoice_items[1][tax_rates][1]' => $this->invoiceItems1taxRates1,
			'invoice_items[1][unit_amount]' => $this->invoiceItems1unitAmount,
			'invoice_items[1][unit_amount_decimal]' => $this->invoiceItems1unitAmountDecimal,
			'schedule' => $this->schedule,
			'subscription' => $this->subscription,
			'subscription_cancel_at_period_end' => $this->subscriptionCancelAtPeriodEnd,
			'subscription_cancel_now' => $this->subscriptionCancelNow,
			'subscription_default_tax_rates[0]' => $this->subscriptionDefaultTaxRates0,
			'subscription_default_tax_rates[1]' => $this->subscriptionDefaultTaxRates1,
			'subscription_items[0][billing_thresholds][usage_gte]' => $this->subscriptionItems0billingThresholdsusageGte,
			'subscription_items[0][clear_usage]' => $this->subscriptionItems0clearUsage,
			'subscription_items[0][deleted]' => $this->subscriptionItems0deleted,
			'subscription_items[0][id]' => $this->subscriptionItems0id,
			'subscription_items[0][metadata]' => $this->subscriptionItems0metadata,
			'subscription_items[0][price]' => $this->subscriptionItems0price,
			'subscription_items[0][price_data][currency]' => $this->subscriptionItems0priceDatacurrency,
			'subscription_items[0][price_data][product]' => $this->subscriptionItems0priceDataproduct,
			'subscription_items[0][price_data][recurring][interval]' => $this->subscriptionItems0priceDatarecurringinterval,
			'subscription_items[0][price_data][recurring][interval_count]' => $this->subscriptionItems0priceDatarecurringintervalCount,
			'subscription_items[0][price_data][tax_behavior]' => $this->subscriptionItems0priceDatataxBehavior,
			'subscription_items[0][price_data][unit_amount]' => $this->subscriptionItems0priceDataunitAmount,
			'subscription_items[0][price_data][unit_amount_decimal]' => $this->subscriptionItems0priceDataunitAmountDecimal,
			'subscription_items[0][quantity]' => $this->subscriptionItems0quantity,
			'subscription_items[0][tax_rates][0]' => $this->subscriptionItems0taxRates0,
			'subscription_items[0][tax_rates][1]' => $this->subscriptionItems0taxRates1,
			'subscription_items[1][billing_thresholds][usage_gte]' => $this->subscriptionItems1billingThresholdsusageGte,
			'subscription_items[1][clear_usage]' => $this->subscriptionItems1clearUsage,
			'subscription_items[1][deleted]' => $this->subscriptionItems1deleted,
			'subscription_items[1][id]' => $this->subscriptionItems1id,
			'subscription_items[1][metadata]' => $this->subscriptionItems1metadata,
			'subscription_items[1][price]' => $this->subscriptionItems1price,
			'subscription_items[1][price_data][currency]' => $this->subscriptionItems1priceDatacurrency,
			'subscription_items[1][price_data][product]' => $this->subscriptionItems1priceDataproduct,
			'subscription_items[1][price_data][recurring][interval]' => $this->subscriptionItems1priceDatarecurringinterval,
			'subscription_items[1][price_data][recurring][interval_count]' => $this->subscriptionItems1priceDatarecurringintervalCount,
			'subscription_items[1][price_data][tax_behavior]' => $this->subscriptionItems1priceDatataxBehavior,
			'subscription_items[1][price_data][unit_amount]' => $this->subscriptionItems1priceDataunitAmount,
			'subscription_items[1][price_data][unit_amount_decimal]' => $this->subscriptionItems1priceDataunitAmountDecimal,
			'subscription_items[1][quantity]' => $this->subscriptionItems1quantity,
			'subscription_items[1][tax_rates][0]' => $this->subscriptionItems1taxRates0,
			'subscription_items[1][tax_rates][1]' => $this->subscriptionItems1taxRates1,
			'subscription_proration_behavior' => $this->subscriptionProrationBehavior,
			'subscription_proration_date' => $this->subscriptionProrationDate,
			'subscription_start_date' => $this->subscriptionStartDate,
			'subscription_trial_from_plan' => $this->subscriptionTrialFromPlan,
		]);
	}
}
