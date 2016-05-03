CHANGELOG
=========

## 2.0.2 - 2016-04-28

* Added `User-Agent` to all requests.
* Added paypal service and default payment method.
* Enabled Checkout Pages API.
* Added API keys management.
* Added `autopay` (boolean) attribute to Subscription entity.
* Enabled User management API and Authentication API.
* Enabled Email Credentials API.
* Added ability to authentication client with JWT.
* Enabled Sessions API.
* Added support of Rate limiting.
* Updated Payments API, added `cancel` method.
* Handle responses with PDF content.
* Update some resource fields.
* Enabled Gateway Accounts API.
* Updated Payments API, added `status` and `result` fields, deprecated `state` field.
* Enabled Custom Fields API.

## 2.0.1-rc - 2015-09-15

* Added support of pagination.
* Updated Customer Authentication API, added `delete` method to reset token.
* Fixed resource factory, use decoded URL.
* Enabled Layouts API.
* Updated Subscriptions API, added `createdTime` and `updatedTime` fields.
* Fixed response body read.
* Updated Payments API, fixed field names.
* Updated Payment Cards API, added creating card from token.
* Updated Transactions API, added `result` field.
* Updated Payment Cards API, added `cvv` field.
* Updated Tokens API, added `create` and `expire` method.
* Enabled Organizations API.
* Updated Plans API, added `delete` method.
* Fixed parsing response w/o content.
* Added `RebillySignature` helper.
* Added fingerprint as blacklist type.
* Enabled custom logger injection.

## 2.0.1-beta - 2015-09-15

* Multiple fixes and enhancements.

## 2.0.1-alpha - 2015-09-15

Initial release.
