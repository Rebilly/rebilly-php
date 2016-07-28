# Change Log
All notable changes to this project will be documented in this file
using the [Keep a CHANGELOG](http://keepachangelog.com/) principles.
This project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]

-

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
- [x] Enabled Email Credentials API.
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
