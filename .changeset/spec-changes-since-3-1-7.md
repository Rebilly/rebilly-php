---
"@rebilly/client-php": patch
---

### Endpoints
- Added endpoint — `GET /account-registration-settings`, `POST /account-registration-settings` + 6 more

### Added
- Added required request property `gatewayAccountId` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more **(breaking)**
- Added optional response property `_links` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional response property `batchId` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional response property `billingAddress` — `GET /quotes`, `POST /quotes` + 8 more
- Added optional request property `billingAddress` — `POST /quotes`, `PUT /quotes/{id}` + 8 more
- Added optional response property `buttonText` — `GET /deposit-requests`, `POST /deposit-requests` + 5 more
- Added optional request property `buttonText` — `POST /deposit-strategies`, `PUT /deposit-strategies/{id}`
- Added optional response property `currentPeriodEnd` on `RecurringOrder, Subscription, SubscriptionItem` — `GET /orders`, `POST /orders` + 11 more
- Added optional request property `currentPeriodEnd` on `RecurringOrder` — `POST /orders`, `PUT /orders/{id}`
- Added optional response property `currentPeriodStart` on `RecurringOrder, Subscription, SubscriptionItem` — `GET /orders`, `POST /orders` + 11 more
- Added optional response property `deliveryAddress` — `GET /quotes`, `POST /quotes` + 8 more
- Added optional request property `deliveryAddress` — `POST /quotes`, `PUT /quotes/{id}` + 8 more
- Added optional response property `fpanLast4` on `OneTimeOrder, RecurringOrder` — `GET /orders`, `POST /orders` + 12 more
- Added required response property `gatewayAccountId` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional response property `gatewayAccountId` — `GET /payout-requests/{id}/payment-instruments`
- Added optional response property `gatewayPayoutInstruction` — `POST /payout-request-allocations`, `GET /payout-request-allocations/{id}` + 9 more
- Added optional parameter request property `header` — `GET /transactions/{id}`
- Added optional response property `id` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional response property `isForceDcc` on `OneTimeOrder, RecurringOrder` — `GET /invoices`, `POST /invoices` + 24 more
- Added optional request property `isForceDcc` on `OneTimeOrder, RecurringOrder, Transaction` — `POST /invoices`, `PUT /invoices/{id}` + 36 more
- Added optional response property `isNewOrder` on `OneTimeOrder, RecurringOrder` — `GET /invoices`, `POST /invoices` + 33 more
- Added optional response property `mergedIntoPayoutRequestId` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional response property `metadata` — `GET /aml-checks`, `GET /aml-checks/{id}` + 3 more
- Added optional response property `mrzChecksum` on `KycSettingsIdentity` — `GET /kyc-documents`, `POST /kyc-documents` + 9 more
- Added optional request property `mrzChecksum` on `KycSettingsIdentity` — `POST /kyc-documents`, `PUT /kyc-documents/{id}` + 7 more
- Added optional response property `mrzChecksumValid` — `GET /kyc-documents`, `POST /kyc-documents` + 7 more
- Added optional response property `noMatchDetails` — `GET /aml-checks`, `GET /aml-checks/{id}` + 3 more
- Added optional response property `paymentMethod` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional response property `payoutRequest` on `OneTimeOrder, RecurringOrder` — `GET /orders`, `POST /orders` + 4 more
- Added optional request property `payoutRequest` on `OneTimeOrder, RecurringOrder` — `POST /orders`, `PUT /orders/{id}` + 1 more
- Added required response property `payoutRequestId` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added media type response property `pdf` — `GET /transactions/{id}`
- Added optional parameter request property `query` — `GET /orders`
- Added optional response property `quoteId` — `GET /credit-memos`, `POST /credit-memos` + 4 more
- Added optional response property `sex` — `GET /kyc-documents`, `POST /kyc-documents` + 7 more
- Added optional request property `sex` on `KycIdentityMatches` — `POST /kyc-documents`, `PUT /kyc-documents/{id}` + 7 more
- Added optional response property `splitFromPayoutRequestId` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional response property `status` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional request property `status` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more
- Added union member request property `subschema #1, subschema #2, subschema #3` on `FlexiblePlan` — `POST /orders`, `PUT /orders/{id}` + 72 more
- Added union member response property `subschema #1, subschema #2, subschema #3` — `POST /plans`, `GET /plans/{id}` + 1 more
- Added optional response property `transactionStatus` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Added optional response property `walletCurrency` — `GET /tokens`, `POST /tokens` + 1 more
- Added optional request property `walletCurrency` — `POST /tokens`
- Added optional response property `walletNetwork` — `GET /tokens`, `POST /tokens` + 1 more
- Added optional request property `walletNetwork` — `POST /tokens`

### Removed
- Removed discriminator variant request property `ShowEddSearchLogsTimelineAction` on `ShowEddSearchLogsTimelineAction` — `POST /credit-memos/{id}/timeline`, `POST /customers/{id}/timeline` + 5 more **(breaking)**
- Removed schema `Edd` (0 endpoints)
- Removed schema `EddScore` (0 endpoints)
- Removed schema `EddScoreDetails` (0 endpoints)
- Removed schema `EddSearchResult` (0 endpoints)
- Removed schema `EddTimeline` (0 endpoints)
- Removed schema `PayoutRequestV2` (0 endpoints)
- Removed schema `ShowEddSearchLogsTimelineAction` (0 endpoints)
- Removed discriminator variant response property `ShowEddSearchLogsTimelineAction` on `ShowEddSearchLogsTimelineAction` — `GET /credit-memos/{id}/timeline`, `POST /credit-memos/{id}/timeline` + 19 more
- Removed optional response property `authTransaction` on `OneTimeOrder, RecurringOrder` — `GET /orders`, `POST /orders` + 9 more
- Removed request property `authTransaction` on `OneTimeOrder, RecurringOrder` — `POST /orders`, `PUT /orders/{id}` + 5 more
- Removed optional response property `isEddRequired` on `OneTimeOrder, RecurringOrder` — `GET /customers`, `POST /customers` + 9 more
- Removed request property `isEddRequired` on `OneTimeOrder, RecurringOrder` — `POST /customers`, `PUT /customers/{id}` + 26 more
- Removed optional response property `isNew` on `OneTimeOrder, RecurringOrder` — `GET /orders`, `POST /orders` + 4 more
- Removed optional response property `matchesDateOfBirth` on `KycSettingsIdentity` — `GET /kyc-documents`, `POST /kyc-documents` + 9 more
- Removed request property `matchesDateOfBirth` on `KycSettingsIdentity` — `POST /kyc-documents`, `PUT /kyc-documents/{id}` + 7 more
- Removed optional response property `method` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Removed request property `method` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more
- Removed optional response property `status` — `GET /payout-request-batches`, `POST /payout-request-batches` + 5 more

### Changed
- Made required request property `amount` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more **(breaking)**
- Made required request property `currency` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more **(breaking)**
- Made required request property `paymentInstrumentId` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more **(breaking)**
- Made nullable response property `transactionId` — `GET /payout-requests`, `POST /payout-requests` + 4 more **(breaking)**
- Made nullable response property `transactionResult` — `GET /payout-requests`, `POST /payout-requests` + 4 more **(breaking)**
- Made required response property `amount` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Made required response property `currency` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Made required response property `paymentInstrumentId` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Became read-only response property `status` — `POST /payout-requests/{id}/split`
- Became read-only response property `transactionId` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Became read-only request property `transactionId` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more
- Made nullable request property `transactionId` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more
- Made nullable request property `transactionResult` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more

### Enum changes
- Enum value added on request `acquirerName` on `AcquirerName`: `Txn` — `POST /invoices`, `PUT /invoices/{id}` + 36 more
- Enum value added on request `gatewayName` on `GatewayName`: `Txn` — `POST /invoices`, `PUT /invoices/{id}` + 36 more
- Enum value added on request `method` on `AlternativePaymentMethods`: `VegaWallet` — `POST /orders`, `PUT /orders/{id}` + 3 more
- Enum value added on request `reason`: `prepayment` — `POST /credit-memos`, `PATCH /credit-memos/{id}` + 6 more
- Enum value added on request `rel`: `mergedInto`, `splitFrom` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more
- Enum value added on request `status`: `approved`, `in-progress`, `merged`, `ready`, `split` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more
- Enum value added on request `transactionResult`: `undefined` — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more
- Enum value added on response `acquirerName` on `AcquirerName`: `Txn` — `GET /invoices`, `POST /invoices` + 24 more
- Enum value added on response `gatewayName` on `GatewayName`: `Txn` — `GET /invoices`, `POST /invoices` + 25 more
- Enum value added on response `method` on `AlternativePaymentMethods`: `VegaWallet` — `GET /orders`, `POST /orders` + 13 more
- Enum value added on response `reason`: `prepayment` — `GET /credit-memos`, `POST /credit-memos` + 4 more
- Enum value added on response `rel`: `mergedInto`, `splitFrom` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Enum value added on response `status`: `waiting-completion`, `approved`, `in-progress`, `merged`, `ready`, `split` — `POST /payout-request-allocations`, `GET /payout-request-allocations/{id}` + 8 more
- Enum value added on response `transactionResult`: `undefined` — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Enum value removed on request `gatewayName`: `A1Gateway`, `ACI`, `Adyen`, `Aera`, `Aircash`, `Airpay` + 221 more — `POST /payout-requests`, `PUT /payout-requests/{id}` + 4 more **(breaking)**
- Enum value removed on request `rel` on `OneTimeOrder, RecurringOrder`: `approvalUrl`, `authTransaction` — `POST /orders`, `PUT /orders/{id}` + 5 more **(breaking)**
- Enum value removed on request `relatedType`: `customer-edd-timeline-comment` — `POST /attachments`, `PUT /attachments/{id}` **(breaking)**
- Enum value removed on response `gatewayName`: `A1Gateway`, `ACI`, `Adyen`, `Aera`, `Aircash`, `Airpay` + 221 more — `GET /payout-requests`, `POST /payout-requests` + 4 more
- Enum value removed on response `rel` on `OneTimeOrder, RecurringOrder`: `approvalUrl`, `authTransaction` — `GET /orders`, `POST /orders` + 9 more
- Enum value removed on response `relatedType`: `customer-edd-timeline-comment` — `GET /attachments`, `POST /attachments` + 2 more
- Enum value removed on response `status`: `instrument-selected`, `partially-fulfilled`, `admin-reversed`, `customer-reversed`, `system-reversed` — `GET /payout-requests`, `POST /payout-requests` + 5 more

### Schema composition refactors
- Refactored under `items` to compose `PayoutRequestAllocation` — `GET /payout-request-allocations`

### Other
- request-property-all-of-removed (184x) — e.g. removed `subschema #1, subschema #2` from the `oneOf[#/components/schemas/OneTimeOrder]/items/items/plan/oneOf[#/compone
- response-property-any-of-added (106x) — e.g. added `subschema #1, subschema #2, subschema #3` to the `items/oneOf[#/components/schemas/OneTimeOrder]/items/items/plan
- response-property-all-of-removed (105x) — e.g. removed `subschema #1, subschema #2` from the `items/oneOf[#/components/schemas/OneTimeOrder]/items/items/plan/oneOf[#/c
- response-property-discriminator-mapping-deleted (21x) — e.g. removed `show-edd-search-logs` discriminator mapping keys from the `items/extraData/actions/items/` response property fo
- request-read-only-property-enum-value-removed (12x) — e.g. removed the enum value `instrument-selected` of the request read-only property `status`
- request-property-discriminator-mapping-deleted (7x) — e.g. removed `show-edd-search-logs` discriminator mapping keys from the `extraData/actions/items/` request property
- api-path-removed-without-deprecation (6x) — e.g. api path removed without deprecation
- request-property-became-not-nullable (6x) — e.g. the request property `allocations/items/gatewayName` became not nullable
- request-property-max-length-set (6x) — e.g. the `allocations/items/gatewayName` request property's maxLength was set to `50`
- response-body-any-of-removed (4x) — e.g. removed `#/components/schemas/OneTimeSalePlan, #/components/schemas/SubscriptionPlan, #/components/schemas/TrialOnlyPlan
