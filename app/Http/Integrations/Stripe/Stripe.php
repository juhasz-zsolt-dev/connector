<?php

namespace App\Http\Integrations\Stripe;

use App\Http\Integrations\Stripe\Resource\Accounts;
use App\Http\Integrations\Stripe\Resource\ApplicationFeeRefunds;
use App\Http\Integrations\Stripe\Resource\ApplicationFees;
use App\Http\Integrations\Stripe\Resource\Balance;
use App\Http\Integrations\Stripe\Resource\BalanceTransactions;
use App\Http\Integrations\Stripe\Resource\Charges;
use App\Http\Integrations\Stripe\Resource\Checkout;
use App\Http\Integrations\Stripe\Resource\CountrySpec;
use App\Http\Integrations\Stripe\Resource\Coupons;
use App\Http\Integrations\Stripe\Resource\CreditNotes;
use App\Http\Integrations\Stripe\Resource\CustomerBalanceTransactions;
use App\Http\Integrations\Stripe\Resource\CustomerCashBalance;
use App\Http\Integrations\Stripe\Resource\CustomerCashBalanceTransactions;
use App\Http\Integrations\Stripe\Resource\CustomerPortal;
use App\Http\Integrations\Stripe\Resource\Customers;
use App\Http\Integrations\Stripe\Resource\CustomerTaxIds;
use App\Http\Integrations\Stripe\Resource\Discounts;
use App\Http\Integrations\Stripe\Resource\Disputes;
use App\Http\Integrations\Stripe\Resource\Events;
use App\Http\Integrations\Stripe\Resource\ExchangeRates;
use App\Http\Integrations\Stripe\Resource\FileLinks;
use App\Http\Integrations\Stripe\Resource\Files;
use App\Http\Integrations\Stripe\Resource\FinancialConnectionsAccounts;
use App\Http\Integrations\Stripe\Resource\FinancialConnectionsSessions;
use App\Http\Integrations\Stripe\Resource\Identity;
use App\Http\Integrations\Stripe\Resource\InvoiceItems;
use App\Http\Integrations\Stripe\Resource\Invoices;
use App\Http\Integrations\Stripe\Resource\IssuingAuthorizations;
use App\Http\Integrations\Stripe\Resource\IssuingCardholders;
use App\Http\Integrations\Stripe\Resource\IssuingCards;
use App\Http\Integrations\Stripe\Resource\IssuingDisputes;
use App\Http\Integrations\Stripe\Resource\IssuingTransactions;
use App\Http\Integrations\Stripe\Resource\Mandates;
use App\Http\Integrations\Stripe\Resource\PaymentIntents;
use App\Http\Integrations\Stripe\Resource\PaymentLinks;
use App\Http\Integrations\Stripe\Resource\PaymentMethods;
use App\Http\Integrations\Stripe\Resource\Payouts;
use App\Http\Integrations\Stripe\Resource\Persons;
use App\Http\Integrations\Stripe\Resource\Prices;
use App\Http\Integrations\Stripe\Resource\Products;
use App\Http\Integrations\Stripe\Resource\PromotionCodes;
use App\Http\Integrations\Stripe\Resource\QuoteLineItems;
use App\Http\Integrations\Stripe\Resource\Quotes;
use App\Http\Integrations\Stripe\Resource\RadarFraudEarlyWarnings;
use App\Http\Integrations\Stripe\Resource\RadarReviews;
use App\Http\Integrations\Stripe\Resource\RadarValueList;
use App\Http\Integrations\Stripe\Resource\RadarValueListItems;
use App\Http\Integrations\Stripe\Resource\Refunds;
use App\Http\Integrations\Stripe\Resource\ReportingReportRuns;
use App\Http\Integrations\Stripe\Resource\ReportingReportType;
use App\Http\Integrations\Stripe\Resource\SecretManagement;
use App\Http\Integrations\Stripe\Resource\SetupAttempts;
use App\Http\Integrations\Stripe\Resource\SetupIntents;
use App\Http\Integrations\Stripe\Resource\ShippingRates;
use App\Http\Integrations\Stripe\Resource\SigmaScheduledQueries;
use App\Http\Integrations\Stripe\Resource\Skus;
use App\Http\Integrations\Stripe\Resource\Sources;
use App\Http\Integrations\Stripe\Resource\SubscriptionItems;
use App\Http\Integrations\Stripe\Resource\Subscriptions;
use App\Http\Integrations\Stripe\Resource\SubscriptionSchedules;
use App\Http\Integrations\Stripe\Resource\TaxRates;
use App\Http\Integrations\Stripe\Resource\TerminalConfigurations;
use App\Http\Integrations\Stripe\Resource\TerminalConnectionTokens;
use App\Http\Integrations\Stripe\Resource\TerminalLocations;
use App\Http\Integrations\Stripe\Resource\TerminalReaders;
use App\Http\Integrations\Stripe\Resource\TestClocks;
use App\Http\Integrations\Stripe\Resource\Tokens;
use App\Http\Integrations\Stripe\Resource\TopUps;
use App\Http\Integrations\Stripe\Resource\TransferReversals;
use App\Http\Integrations\Stripe\Resource\Transfers;
use App\Http\Integrations\Stripe\Resource\TreasuryCreditReversals;
use App\Http\Integrations\Stripe\Resource\TreasuryDebitReversals;
use App\Http\Integrations\Stripe\Resource\TreasuryFinancialAccountFeatures;
use App\Http\Integrations\Stripe\Resource\TreasuryFinancialAccounts;
use App\Http\Integrations\Stripe\Resource\TreasuryInboundTransfers;
use App\Http\Integrations\Stripe\Resource\TreasuryOutboundPayments;
use App\Http\Integrations\Stripe\Resource\TreasuryOutboundTransfers;
use App\Http\Integrations\Stripe\Resource\TreasuryReceivedCredits;
use App\Http\Integrations\Stripe\Resource\TreasuryReceivedDebits;
use App\Http\Integrations\Stripe\Resource\TreasuryTransactionEntries;
use App\Http\Integrations\Stripe\Resource\TreasuryTransactions;
use App\Http\Integrations\Stripe\Resource\WebhookEndpoints;
use Saloon\Http\Connector;

/**
 * Stripe API
 */
class Stripe extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://api.stripe.com/';
    }

    public function accounts(): Accounts
    {
        return new Accounts($this);
    }

    public function applicationFeeRefunds(): ApplicationFeeRefunds
    {
        return new ApplicationFeeRefunds($this);
    }

    public function applicationFees(): ApplicationFees
    {
        return new ApplicationFees($this);
    }

    public function balance(): Balance
    {
        return new Balance($this);
    }

    public function balanceTransactions(): BalanceTransactions
    {
        return new BalanceTransactions($this);
    }

    public function charges(): Charges
    {
        return new Charges($this);
    }

    public function checkout(): Checkout
    {
        return new Checkout($this);
    }

    public function countrySpec(): CountrySpec
    {
        return new CountrySpec($this);
    }

    public function coupons(): Coupons
    {
        return new Coupons($this);
    }

    public function creditNotes(): CreditNotes
    {
        return new CreditNotes($this);
    }

    public function customerBalanceTransactions(): CustomerBalanceTransactions
    {
        return new CustomerBalanceTransactions($this);
    }

    public function customerCashBalance(): CustomerCashBalance
    {
        return new CustomerCashBalance($this);
    }

    public function customerCashBalanceTransactions(): CustomerCashBalanceTransactions
    {
        return new CustomerCashBalanceTransactions($this);
    }

    public function customerPortal(): CustomerPortal
    {
        return new CustomerPortal($this);
    }

    public function customerTaxIds(): CustomerTaxIds
    {
        return new CustomerTaxIds($this);
    }

    public function customers(): Customers
    {
        return new Customers($this);
    }

    public function discounts(): Discounts
    {
        return new Discounts($this);
    }

    public function disputes(): Disputes
    {
        return new Disputes($this);
    }

    public function events(): Events
    {
        return new Events($this);
    }

    public function exchangeRates(): ExchangeRates
    {
        return new ExchangeRates($this);
    }

    public function fileLinks(): FileLinks
    {
        return new FileLinks($this);
    }

    public function files(): Files
    {
        return new Files($this);
    }

    public function financialConnectionsAccounts(): FinancialConnectionsAccounts
    {
        return new FinancialConnectionsAccounts($this);
    }

    public function financialConnectionsSessions(): FinancialConnectionsSessions
    {
        return new FinancialConnectionsSessions($this);
    }

    public function identity(): Identity
    {
        return new Identity($this);
    }

    public function invoiceItems(): InvoiceItems
    {
        return new InvoiceItems($this);
    }

    public function invoices(): Invoices
    {
        return new Invoices($this);
    }

    public function issuingAuthorizations(): IssuingAuthorizations
    {
        return new IssuingAuthorizations($this);
    }

    public function issuingCardholders(): IssuingCardholders
    {
        return new IssuingCardholders($this);
    }

    public function issuingCards(): IssuingCards
    {
        return new IssuingCards($this);
    }

    public function issuingDisputes(): IssuingDisputes
    {
        return new IssuingDisputes($this);
    }

    public function issuingTransactions(): IssuingTransactions
    {
        return new IssuingTransactions($this);
    }

    public function mandates(): Mandates
    {
        return new Mandates($this);
    }

    public function paymentIntents(): PaymentIntents
    {
        return new PaymentIntents($this);
    }

    public function paymentLinks(): PaymentLinks
    {
        return new PaymentLinks($this);
    }

    public function paymentMethods(): PaymentMethods
    {
        return new PaymentMethods($this);
    }

    public function payouts(): Payouts
    {
        return new Payouts($this);
    }

    public function persons(): Persons
    {
        return new Persons($this);
    }

    public function prices(): Prices
    {
        return new Prices($this);
    }

    public function products(): Products
    {
        return new Products($this);
    }

    public function promotionCodes(): PromotionCodes
    {
        return new PromotionCodes($this);
    }

    public function quoteLineItems(): QuoteLineItems
    {
        return new QuoteLineItems($this);
    }

    public function quotes(): Quotes
    {
        return new Quotes($this);
    }

    public function radarFraudEarlyWarnings(): RadarFraudEarlyWarnings
    {
        return new RadarFraudEarlyWarnings($this);
    }

    public function radarReviews(): RadarReviews
    {
        return new RadarReviews($this);
    }

    public function radarValueList(): RadarValueList
    {
        return new RadarValueList($this);
    }

    public function radarValueListItems(): RadarValueListItems
    {
        return new RadarValueListItems($this);
    }

    public function refunds(): Refunds
    {
        return new Refunds($this);
    }

    public function reportingReportRuns(): ReportingReportRuns
    {
        return new ReportingReportRuns($this);
    }

    public function reportingReportType(): ReportingReportType
    {
        return new ReportingReportType($this);
    }

    public function secretManagement(): SecretManagement
    {
        return new SecretManagement($this);
    }

    public function setupAttempts(): SetupAttempts
    {
        return new SetupAttempts($this);
    }

    public function setupIntents(): SetupIntents
    {
        return new SetupIntents($this);
    }

    public function shippingRates(): ShippingRates
    {
        return new ShippingRates($this);
    }

    public function sigmaScheduledQueries(): SigmaScheduledQueries
    {
        return new SigmaScheduledQueries($this);
    }

    public function skus(): Skus
    {
        return new Skus($this);
    }

    public function sources(): Sources
    {
        return new Sources($this);
    }

    public function subscriptionItems(): SubscriptionItems
    {
        return new SubscriptionItems($this);
    }

    public function subscriptionSchedules(): SubscriptionSchedules
    {
        return new SubscriptionSchedules($this);
    }

    public function subscriptions(): Subscriptions
    {
        return new Subscriptions($this);
    }

    public function taxRates(): TaxRates
    {
        return new TaxRates($this);
    }

    public function terminalConfigurations(): TerminalConfigurations
    {
        return new TerminalConfigurations($this);
    }

    public function terminalConnectionTokens(): TerminalConnectionTokens
    {
        return new TerminalConnectionTokens($this);
    }

    public function terminalLocations(): TerminalLocations
    {
        return new TerminalLocations($this);
    }

    public function terminalReaders(): TerminalReaders
    {
        return new TerminalReaders($this);
    }

    public function testClocks(): TestClocks
    {
        return new TestClocks($this);
    }

    public function tokens(): Tokens
    {
        return new Tokens($this);
    }

    public function topUps(): TopUps
    {
        return new TopUps($this);
    }

    public function transferReversals(): TransferReversals
    {
        return new TransferReversals($this);
    }

    public function transfers(): Transfers
    {
        return new Transfers($this);
    }

    public function treasuryCreditReversals(): TreasuryCreditReversals
    {
        return new TreasuryCreditReversals($this);
    }

    public function treasuryDebitReversals(): TreasuryDebitReversals
    {
        return new TreasuryDebitReversals($this);
    }

    public function treasuryFinancialAccountFeatures(): TreasuryFinancialAccountFeatures
    {
        return new TreasuryFinancialAccountFeatures($this);
    }

    public function treasuryFinancialAccounts(): TreasuryFinancialAccounts
    {
        return new TreasuryFinancialAccounts($this);
    }

    public function treasuryInboundTransfers(): TreasuryInboundTransfers
    {
        return new TreasuryInboundTransfers($this);
    }

    public function treasuryOutboundPayments(): TreasuryOutboundPayments
    {
        return new TreasuryOutboundPayments($this);
    }

    public function treasuryOutboundTransfers(): TreasuryOutboundTransfers
    {
        return new TreasuryOutboundTransfers($this);
    }

    public function treasuryReceivedCredits(): TreasuryReceivedCredits
    {
        return new TreasuryReceivedCredits($this);
    }

    public function treasuryReceivedDebits(): TreasuryReceivedDebits
    {
        return new TreasuryReceivedDebits($this);
    }

    public function treasuryTransactionEntries(): TreasuryTransactionEntries
    {
        return new TreasuryTransactionEntries($this);
    }

    public function treasuryTransactions(): TreasuryTransactions
    {
        return new TreasuryTransactions($this);
    }

    public function webhookEndpoints(): WebhookEndpoints
    {
        return new WebhookEndpoints($this);
    }
}
