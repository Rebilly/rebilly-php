---
"@rebilly/client-php": minor
---

### Enum changes

- Enum value added on request `type` on `StorefrontProofOfAddressKycDocument, StorefrontProofOfCreditFileKycDocument, StorefrontProofOfFundsKycDocument, StorefrontProofOfIdentityKycDocument, StorefrontProofOfPurchaseKycDocument`: `name-and-dob-mismatch` — `POST /kyc-documents`, `PUT /kyc-documents/{id}` + 9 more
- Enum value added on response `rejectionReason`: `name-and-dob-mismatch` — `GET /experimental/reports/kyc-rejection-summary`
- Enum value added on response `type` on `StorefrontProofOfAddressKycDocument, StorefrontProofOfCreditFileKycDocument, StorefrontProofOfFundsKycDocument, StorefrontProofOfIdentityKycDocument, StorefrontProofOfPurchaseKycDocument`: `name-and-dob-mismatch` — `GET /kyc-documents`, `POST /kyc-documents` + 11 more
