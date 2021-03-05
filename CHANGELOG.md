# Change Log
All notable changes to this project will be documented in this file
using the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

<!--
Types of changes

Added - for new features.
Changed - for changes in existing functionality.
Deprecated - for soon-to-be removed features.
Removed - for now removed features.
Fixed - for any bug fixes.
Security - in case of vulnerabilities.
-->

## [Unreleased]

### Added

- [x] Added new properties to `Dispute`: `transaction`, `category`, `rawResponse`, `caseId`

## [2.11.0] 2021-03-03

### Added

- [x] Added new property to `Plan`: `createdTime`
- [x] Added new property to `Invoice`: `createdTime`
- [x] Added new property to `Transaction`: `isMerchantInitiated`
- [x] Added new property to `BrowserData`: `isJavaEnabled`
- [x] Added new property to `RiskMetadata`: `browserData`
- [x] Added new property to `CommonPaymentInstrument`, `BankAccount`, `PaymentCard`, `PayPalAccount`: `riskMetadata`
- [x] Added new property to `PaymentToken`: `riskMetadata`
- [x] Added new property to `Dispute`: `customerId`
- [x] Added new property to `GatewayAccount`: `status`

### Removed

- [x] Removed **Layouts API**
- [x] Removed deprecated `ApiKey` property: `datetimeFormat`
- [x] Removed deprecated `ApiKey` method: `datetimeFormats`
- [x] Removed deprecated `ApiKey` constants: `DATETIME_FORMAT_MYSQL`, `DATETIME_FORMAT_ISO8601`, `MSG_UNEXPECTED_DATETIME_FORMAT`
- [x] Removed deprecated `BrowserData` properties: `acceptHeader`, `ipAddress`, `javaEnabled`, `userAgent`, `deviceFingerprintHash`
- [x] Removed deprecated `CommonPaymentInstrument`, `BankAccount`, `PaymentCard`, `PayPalAccount` properties: `browserData`

### Fixed

- [x] Added missing attribute value factories for `Address`: `createPhoneNumbers`, `createEmails`

## [2.10.0] 2021-01-21

### Added

- [x] Added new properties to `KycDocument`: `matchLevel`, `reason`
- [x] Added new properties to `Transaction`: `arn`, `paymentInstruction`
- [x] Added new properties to `RiskMetadata`: `hasMismatchedTimeZone`, `hasMismatchedBankCountry`, `hasMismatchedBillingAddressCountry`
- [x] Added new property to `ApiKey`: `apiUser`

### Deprecated
- [x] Deprecated `Transaction` method: `setPaymentInstrument`

### Removed

- [x] Removed `ApiKey` property: `userName`

## [2.9.0] 2020-11-18

### Added

- [x] Added **Blocklist API**
- [x] Added **Plaid Credentials API**
- [x] Added **Experian Credentials API**
- [x] Added **Payment Instruments API**
- [x] Added `PaymentToken`
- [x] Added `Client::paymentTokens()` factory
- [x] Added `KhelocardCardPaymentInstrument` for **Khelocard** payment tokens
- [x] Added new property to `SubscriptionChangePlan`: `keepTrial`

### Changed

- [x] Removed API version from request URIs. See [Rebilly REST API Guide](https://api-reference.rebilly.com/) for more details.

### Deprecated

- [x] Deprecated `Client::CURRENT_VERSION` constant
- [x] Deprecated `Blacklist`
- [x] Deprecated `PaymentCardToken`
- [x] Deprecated `Client::paymentCardTokens()` factory
- [x] Deprecated `Coupon` method: `getRedemptionCode()` in favor `getId()`
- [x] Deprecated `Redemption` method: `getRedemptionCode()`, `setRedemptionCode()` in favor `getCouponId()`/`setCouponId()`

### Removed

- [x] Removed **Payment Cards Migrations API**
- [x] Removed payment methods restriction in the `PaymentMethodInstrument`
- [x] Removed payment methods restriction in the `GatewayAccount`
- [x] Removed deprecated `PayPalAccount` method: `getApprovalLink`
- [x] Removed **Checkout Pages API**

## [2.8.0] 2020-07-02

### Added

- [x] Added new **AML API**
- [x] Added new **Gateway Account Limit API**
- [x] Added new properties to `GatewayAccount`: `reconciliationWindowEnabled`, `reconciliationWindowTtl`
- [x] Added new properties to `Transaction`: `planIds`, `isDisputed`, `retriedTransactionId`
- [x] Added new properties to `PaymentCard`: `fingerprint`, `browserData`
- [x] Added new properties to `BankAccount`: `browserData`, `billingAddress`
- [x] Added new property to `PayPalAccount`: `browserData`
- [x] Added new method to `PayPalAccount`: `getApprovalUrl`
- [x] Added new property to `LeadSource`: `referrer`
- [x] Added new property to `GatewayAccount`: `additionalFilters`
- [x] Added new methods to `GatewayAccount`: `getAdditionalFilters`, `setAdditionalFilters`
- [x] Added new property to `GatewayAccount`: `digitalWallets`
- [x] Added new methods to `GatewayAccount`: `setDigitalWallets`, `getDigitalWallets`
- [x] Added new properties to `Invoice`: `transactions`, `poNumber`, `notes`
- [x] Added new property to `Subscription`: `recentInvoice`
- [x] Added `patch` method to `TransactionService`

### Deprecated

- [x] Deprecated `PayPalAccount` method: `getApprovalLink`
- [x] Deprecated `Subscription` method: `cancel` (use `SubscriptionCancellation` instead)
- [x] Deprecated `SubscriptionCancel` class.

### Removed

- [x] Removed deprecated **Payments API** 
- [x] Removed deprecated **Contacts API**
- [x] Removed **Payment Instrument Validation API**
- [x] Removed `SchedulePaymentService` service and `ScheduledPayment` entity 
- [x] Removed deprecated `PaymentCard` properties: `panFingerprint`, `billingContactId`
- [x] Removed deprecated `BankAccount` properties: `contactId`, `address`
- [x] Removed deprecated `PayPalAccount` property: `contactId`
- [x] Removed deprecated `Invoice` properties: `billingContactId`, `deliveryContactId`
- [x] Removed deprecated `Transaction` properties: `redirectUrls`
- [x] Removed deprecated `PaymentCard` method: `setStatus`
- [x] Removed deprecated `BankAccount` method: `getContact`
- [x] Removed deprecated `PayPalAccount` methods: `getContact`, `setUserName`
- [x] Removed deprecated `GatewayAccount` methods: `getAdditionalCriteria`, `setAdditionalCriteria`, `createAdditionalCriteria`

## [2.7.0] 2020-02-11

### Added

- [x] Added new property to `SubscriptionChangePlan`: `quantity`
- [x] Added new properties to `ApiTracking`: `relatedIds`, `requestHeaders`, `responseHeaders`

### Removed

- [x] Removed `Note` entity, `NoteService` service

## [2.6.0] 2020-01-14

### Added

- [x] Added support for empty redirect responses
- [x] Added new property to `Customer`: `websiteId`
- [x] Added new property to `Transaction`: `requestId`
- [x] Added new property to `Website`: `organizationId`
- [x] Added new property to `PaymentCard`: `stickyGatewayAccountId`
- [x] Added `CheckInstrument`, `AlternativeInstrument`, `Customer Timeline` 
- [x] Added `iDEAL`, `Klarna`, `Interac`, `Onlineueberweisen` to supported alternative payment instruments
- [x] Added `description` field to `ValuesList` 
- [x] Added `reissue` method to `InvoiceService` 
- [x] Added `dueTime` to `InvoiceService::issue()` 
- [x] Added new properties to `Transaction`: `requestAmount`, `requestCurrency`, `purchaseAmount`, `purchaseCurrency`, `reportAmount`, `reportCurrency`, `isProcessedOutside`
- [x] Added field `additionalCriteria` into `GatewayAccount` object
- [x] Added field `dueTimeShift` into `BillingAnchor` object
- [x] Added `getUpcomingInvoices` and `issueUpcomingInvoice` methods to **SubscriptionService**
- [x] Added `recalculate` method to **InvoiceService**
- [x] Added `EmailTemplate` as a part of `EmailNotification` to support multi-locale emails in RulesEngine
- [x] Added `getUrlPathSegment`, `setUrlPathSegment`, `getRedirect`, `setRedirect`, `getStatus`, `setStatus`, `getIsCustomCustomerIdAllowed`, `setIsCustomCustomerIdAllowed` method to `CheckoutPage`
- [x] Added `Organization-Id` header to Client config

### Changed

- [x] Renamed field `billingAnchor` into `invoiceTimeShift` in `Subscription` object

### Deprecated

- [x] Deprecated `Transaction` entity method: `getPaymentCardId`
- [x] Deprecated `PayPalAccount` entity method: `setUserName`
- [x] Deprecated `PaymentCard` entity method: `setStatus`
- [x] Deprecated `CheckoutPage` entity methods: `getUriPath`, `setUriPath`, `getAllowCustomCustomerId`, `setAllowCustomCustomerId`, `getIsActive`, `setIsActive`

### Removed

- [x] Removed Payments Queue API
- [X] Removed `Transaction` entity method: `getPayment`
- [x] Removed `ValuesList` field: `name` 
- [x] Removed field `websites` from `GatewayAccount` object 
- [x] Removed `EmailNotification` entity methods related to an actual `EmailTemplate`

## [2.5.0] 2019-07-19

### Fixed

- [x] Fixed CurlHandler to support HTTP/2

## [2.4.0] 2019-07-01

### Fixed

- [x] Added missing options in Client constructor.

### Added

- [x] Added custom fields to `Plan`
- [x] Added new write-only property to set payment instrument from `token` for the `Customer` Resource.
- [x] Added new property to `RiskMetadata`: `region`
- [x] Added new properties to `Customer`: `averageValue`, `paymentCount`, `lastPaymentTime`
- [x] Added new service `WebhookCredentials`
- [x] Added new property to `PaymentCardAuthorization`: `redirectUrl` 
- [x] Added new links to `PaymentCard`: `approvalUrl`, `authTransaction` 
- [x] Added new property to `Subscription`: `recentInvoiceId` 
- [x] Added POST to `Transaction` 
- [x] Added new property to `PaymentCardToken`: `isUsed`
- [x] Added new blacklist types to `Blacklist`: `email-domain`, `bank-account`, `address`
- [x] Added new `taxCategory` to `Product`
- [x] Added new property to `Blacklist`: `expirationTime`
- [x] Added `cancel` method to `Transaction` service
- [x] Added new properties to `Invoice`: `retryInstruction`, `autopayScheduledTime`
- [x] Added `resend` method to **WebhookTracking** service
- [x] Added `merge` method to **Customer** service
- [x] Added new service `Rule`
- [x] Added new method to `AuthenticationTokenService`: `exchange`
- [x] Added new properties to `Session`: `customerId`, `type`
- [x] Added new properties to `AuthenticationToken`: `mode`, `invalidate`
- [x] Added new properties to `Transaction`: `customFields`, `description`, `processedTime`, `scheduledTime`, `velocity`, `revision`
- [x] Added new properties to `PaymentCard`: `method`, `panFingerprint`
- [x] Added new properties to `BankAccount`: `accountNumberType`, `last4`, `bic`, `method`, `fingerprint`, `token`
- [x] Added missing getters and setters to `AuthenticationToken`, `Transaction`, `PaymentCard`, `BankAccount`
- [x] Removed `delete` method from `SessionService`
- [x] Added new method to `SessionService`: `logout`
- [x] Added new method to `BankAccountService`: `update`, `createFromToken`

### Changed

- [x] **Upgraded minimum PHP version to 7.1**

### Deprecated

- [x] Deprecated `Customer` entity methods: `getFirstName`, `setFirstName`, `getLastName`, `setLastName`, `getEmail`, `setEmail`
- [x] Deprecated `Blacklist` `expiredTime` property

## [2.3.0] 2018-10-08

### Added

- [x] Added new properties to `Plan`: `pricing`, `recurringInterval`, `trial`, `setup`
- [x] Added new property to `Subscription`: `items`
- [x] Added new property to `LeadSource`: `original`

### Changed

- [x] Replaced magic methods like `get`, `post` with explicit defined methods.

### Removed

- [x] Removed deprecated `Plan` properties: `expiredTime`, `recurringAmount`, `trialAmount`, `setupAmount`,
      `recurringPeriodUnit`, `recurringPeriodLength`, `recurringPeriodLimit`, `trialPeriodUnit`, `trialPeriodLength`,
      `contractTermUnit`, `contractTermLength`, `minQuantity`, `maxQuantity`
- [x] Removed `LeadSources` in **Transactions**, **Invoices** and **Subscriptions**
- [x] Removed `LeadSources` endpoint and service. Adding Lead Sources now only possible via **Tokens** and **Customers**
- [x] Removed deprecated `Subscription` properties: `planId`, `quantity`,
      `billingContactId`, `billingContact`, `deliveryContactId`, `deliveryContact`
- [x] Removed deprecated `LeadSource` property: `ipAddress`
- [x] Removed `Notification`, `EmailNotification` and `EmailNotificationTracking`.
- [x] Deprecate setting `initialInvoiceId` property when creating a `Subscription`.

## [2.2.0] 2018-08-14

### Added

- [x] Added support for subscription interim invoices.
- [x] Added schema for subscriptions `change-plan` endpoint.
- [x] Added `SubscriptionChangePlan`. 
- [x] Added `lineItems` and `lineItemSubtotal` to `Subscription` entity.
- [x] Implemented new Subscription Cancellations API.
- [x] Implemented Subscription-reactivations API.
- [x] Implemented KYC Documents API.
- [x] Implemented Gateway Account Downtime API.
- [x] Implemented Email Notifications API.
- [x] Added Customer Lifetime Revenue.
- [x] Added route to ApiTracking.
- [x] Added productId to Plan.
- [x] Added setting status to payment card.
- [x] Added payment instrument validation.

### Removed

- [x] Removed Subscription switch.
- [x] Removed support for Subscription Tracking.
- [x] Removed downtime settings in Gateway Account API.
- [x] Removed custom fields deletion.

### Fixed

- [x] Fixed PATCH calls.
- [x] Fixed reset-password endpoint.
- [x] Fix coupons restrictions.

### Deprecated

- [x] Deprecated support for old `subscription/{id}/cancel` endpoint (`SubscriptionCancel` with policy).
- [x] Deprecated Redemption's redeemedTime in favor of createdTime.

## [2.1.0] 2018-01-04

- [x] Updated Invoice methods to use `websiteId` and `customerId`
- [x] Rename `Email` object to `ForgotPassword` and update corresponding usages.
- [x] Fix erroneous import of wrong `Email` object.
- [x] Removed **Website** checkoutPageUri.

## [2.0.7] 2017-09-13

### Added

- [x] Added ability to configure permission of the `PATCH` method for the user session.
- [x] Added missing getters and setters in the `Subscription`, `SubscriptionSwitch`, `Transaction`, `Coupon`.
- [x] Added `status` property in the `Invoice`.
- [x] Added `DELETE` method to the **Contacts API**.
- [x] Added **Contact Value Object** which is replacement to the relations between `Contact` and other resource,
      like `Transaction`, `Invoice` and others.
- [x] Implemented **Values List API**.
- [x] Added new endpoint to change the Coupon expiration.
- [x] Implemented **Products API**.
- [x] Implemented **Shipping Zone API**.
- [x] Implemented **Webhooks API**.
- [x] Implemented **Webhooks Tracking API**.
- [x] Implemented **Risk Metadata API**.

### Removed

- [x] Removed Email Credentials API, it is never used.
- [x] Removed attribute `threeDSecureType` from the `Transaction`.

### Fixed

- [x] Fixed some erroneous properties in resources.

## [2.0.6] 2017-01-07

### Added

- [x] Added support for `Files` and `Attachments`. 
- [x] Added support for `Subscription` resource attributes: `inTrial` and `rebillNumber`.  
- [x] Added support to delete `Layout` resources.
- [x] Added support to `activate` a `User`.
- [x] Added support to delete a `WebsiteWebhook`.
 
### Changed

- [x] Require PHP 7.1 unit tests to pass, and updated README. PHP 5.5 is at end of life and not supported by PHP.  We recommend upgrading if you are using PHP 5.5.  We will continue support of it for now.

### Fixed

- [x] Fixed `SDK_VERSION` now properly incremented.
- [x] Fixed `PaymentCardToken` to properly set the `method` attribute.


## [2.0.5] 2016-11-29

### Added

- [x] Added support for `Blacklist` `expiredTime` attribute, and deprecated `expireTime` attribute.
- [x] Added support for `Coupons` and `Discounts` and `Restrictions`.
- [x] Added support for `Gateway` object inside of `Transaction` response.
- [x] Added support for `LeadSource` on `Invoice`, `Payment` and `Subscription`.
- [x] Added support for `Note`s attached `PaymentCard`, `GatewayAccount`, `Subscription` and `Transaction`.
- [x] Added support for `Payment` attributes `retryInstruction` and `retryNumber`, and added support for creating instructions.
- [x] Added support for `PaymentCardMigrations`.

### Changed

- [x] Changed all enum values and made it consistent using `kebab-case` notation of naming.
- [x] Moved support for the deprecated Website Webhooks to own object `WebsiteWebhook`.
- [x] `LeadSource` is not an independent entity, but a child of `Customer`, `Subscription`, `Invoice`, or `Payment`.

### Fixed

- [x] Fixed `bankName` attribute in `BankAccount`.

## [2.0.4] 2016-08-12

### Added

- [x] Added `userId` attribute to `Session`. 

### Fixed

- [x] Fixed `bankName` attribute in `BankAccount`.

## [2.0.3] 2016-07-29

### Added

- [x] Enabled Disputes API.
- [x] Enabled Webhook Tracking API.
- [x] Enabled Subscription Tracking API.
- [x] Enabled API Tracking.
- [x] Use vendor headers without additional prefixes.

### Changed

- [x] Updated Payment Tokens API, added `paymentInstrument`.
- [x] Updated Gateway Accounts API, added `method`.
- [x] Updated Payment Cards API, added `bin`.
- [x] Updated Payments API, added missing supported methods.

### Deprecated

- [x] Since Payment Tokens resource was extended with `paymentInstrument`, all fields related to 
payment card are deprecated.
- [x] The `paymentMethods` was renamed to `paymentCardSchemes`, all methods related to old name 
are deprecated. 

### Fixed

- [x] Fixed Gateway payment schemes.

## [2.0.2] 2016-04-28

### Added

- [x] Added `User-Agent` to all requests.
- [x] Added paypal service and default payment method.
- [x] Enabled Checkout Pages API.
- [x] Added API keys management.
- [x] Added `autopay` (boolean) attribute to Subscription entity.
- [x] Enabled User management API and Authentication API.
- [x] Added ability to authentication client with JWT.
- [x] Enabled Sessions API.
- [x] Added support of Rate limiting.
- [x] Handle responses with PDF content.
- [x] Enabled Gateway Accounts API.
- [x] Enabled Custom Fields API.
- [x] Updated Payments API, added `cancel` method.

### Changed

- [x] Update some resource fields.
- [x] Updated Payments API, added `status` and `result` fields, deprecated `state` field.

## [2.0.1-rc] 2015-09-15

### Added

- [x] Added support of pagination.
- [x] Enabled Layouts API.
- [x] Enabled Organizations API.
- [x] Added `RebillySignature` helper.
- [x] Added fingerprint as blacklist type.
- [x] Enabled custom logger injection.
- [x] Updated Customer Authentication API, added `delete` method to reset token.
- [x] Updated Subscriptions API, added `createdTime` and `updatedTime` fields.
- [x] Updated Payment Cards API, added creating card from token.
- [x] Updated Transactions API, added `result` field.
- [x] Updated Payment Cards API, added `cvv` field.
- [x] Updated Tokens API, added `create` and `expire` method.
- [x] Updated Plans API, added `delete` method.

### Fixed

- [x] Updated Payments API, fixed field names.
- [x] Fixed resource factory, use decoded URL.
- [x] Fixed response body read.
- [x] Fixed parsing response w/o content.

## [2.0.1-beta] 2015-09-15

Multiple fixes and enhancements.

## [2.0.1-alpha] 2015-09-15

Initial release.
