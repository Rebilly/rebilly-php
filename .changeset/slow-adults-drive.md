---
"@rebilly/client-php": major
---

### Added

- Added optional response property `automaticReadinessTime` on `OneTimeOrder, RecurringOrder` — `GET /orders`, `POST /orders` + 9 more
- Added optional request property `automaticReadinessTime` on `OneTimeOrder, RecurringOrder` — `POST /orders`, `PUT /orders/{id}` + 3 more
- Added optional response property `sticky` on `FlexiblePlan` — `GET /orders`, `POST /orders` + 34 more
- Added optional request property `sticky` on `FlexiblePlan` — `POST /orders`, `PUT /orders/{id}` + 72 more

### Changed

- Discriminator mapping added response property `IMerchant` — `GET /gateway-accounts`
- Discriminator mapping added request property `IMerchant` — `POST webhook:gateway-account-downtime-ended`, `POST webhook:gateway-account-downtime-started` + 3 more

### Enum changes

- Enum value added on request `gatewayName` on `GatewayName`: `IMerchant` — `POST /gateway-accounts`, `PATCH /gateway-accounts/{id}` + 46 more
- Enum value added on request `type` on `StorefrontProofOfAddressKycDocument, StorefrontProofOfCreditFileKycDocument, StorefrontProofOfFundsKycDocument, StorefrontProofOfIdentityKycDocument, StorefrontProofOfPurchaseKycDocument`: `name-and-dob-mismatch` — `POST /kyc-documents`, `PUT /kyc-documents/{id}` + 9 more
- Enum value added on response `gatewayName` on `GatewayName`: `IMerchant` — `GET /gateway-accounts`, `POST /gateway-accounts` + 47 more
- Enum value added on response `rejectionReason`: `name-and-dob-mismatch` — `GET /experimental/reports/kyc-rejection-summary`
- Enum value added on response `type` on `StorefrontProofOfAddressKycDocument, StorefrontProofOfCreditFileKycDocument, StorefrontProofOfFundsKycDocument, StorefrontProofOfIdentityKycDocument, StorefrontProofOfPurchaseKycDocument`: `name-and-dob-mismatch` — `GET /kyc-documents`, `POST /kyc-documents` + 11 more

### Other

- response-body-discriminator-mapping-added (8x) — e.g. added `IMerchant` mapping keys to the response discriminator for the response status `201`
- request-property-min-increased (7x) — e.g. the `oneOf[#/components/schemas/OneTimeOrder]/_embedded/website/settings/payoutRequest/pendingPeriodHours` request prope
- request-body-discriminator-mapping-added (3x) — e.g. added `IMerchant` mapping keys to the request discriminator
