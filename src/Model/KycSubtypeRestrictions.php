<?php

/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

use JsonSerializable;
use Rebilly\Sdk\Trait\HasMetadata;

class KycSubtypeRestrictions implements JsonSerializable
{
    use HasMetadata;

    public const IDENTITY_PROOF_PASSPORT = 'passport';

    public const IDENTITY_PROOF_ID_CARD = 'id-card';

    public const IDENTITY_PROOF_DRIVER_LICENSE = 'driver-license';

    public const IDENTITY_PROOF_BIRTH_CERTIFICATE = 'birth-certificate';

    public const IDENTITY_PROOF_UTILITY_BILL = 'utility-bill';

    public const IDENTITY_PROOF_RENTAL_RECEIPT = 'rental-receipt';

    public const IDENTITY_PROOF_LEASE_AGREEMENT = 'lease-agreement';

    public const IDENTITY_PROOF_COPY_CREDIT_CARD = 'copy-credit-card';

    public const IDENTITY_PROOF_CREDIT_CARD_STATEMENT = 'credit-card-statement';

    public const IDENTITY_PROOF_BANK_STATEMENT = 'bank-statement';

    public const IDENTITY_PROOF_INHERITANCE_DOCUMENTATION = 'inheritance-documentation';

    public const IDENTITY_PROOF_TAX_RETURN = 'tax-return';

    public const IDENTITY_PROOF_SALARY_SLIP = 'salary-slip';

    public const IDENTITY_PROOF_SALE_OF_ASSETS = 'sale-of-assets';

    public const IDENTITY_PROOF_PUBLIC_HEALTH_CARD = 'public-health-card';

    public const IDENTITY_PROOF_PROOF_OF_AGE_CARD = 'proof-of-age-card';

    public const IDENTITY_PROOF_REVERSE_OF_ID = 'reverse-of-id';

    public const IDENTITY_PROOF_PUBLIC_SERVICE = 'public-service';

    public const IDENTITY_PROOF_EWALLET_HOLDER_DETAILS = 'ewallet-holder-details';

    public const IDENTITY_PROOF_EWALLET_TRANSACTION_STATEMENT = 'ewallet-transaction-statement';

    public const IDENTITY_PROOF_MARRIAGE_CERTIFICATE = 'marriage-certificate';

    public const IDENTITY_PROOF_FIREARMS_LICENSE = 'firearms-license';

    public const IDENTITY_PROOF_INSURANCE_LETTER = 'insurance-letter';

    public const IDENTITY_PROOF_INCOME_STATEMENT = 'income-statement';

    public const IDENTITY_PROOF_DEBTORS_LETTER = 'debtors-letter';

    public const IDENTITY_PROOF_OTHER = 'other';

    public const IDENTITY_PROOF_NULL = 'null';

    public const ADDRESS_PROOF_PASSPORT = 'passport';

    public const ADDRESS_PROOF_ID_CARD = 'id-card';

    public const ADDRESS_PROOF_DRIVER_LICENSE = 'driver-license';

    public const ADDRESS_PROOF_BIRTH_CERTIFICATE = 'birth-certificate';

    public const ADDRESS_PROOF_UTILITY_BILL = 'utility-bill';

    public const ADDRESS_PROOF_RENTAL_RECEIPT = 'rental-receipt';

    public const ADDRESS_PROOF_LEASE_AGREEMENT = 'lease-agreement';

    public const ADDRESS_PROOF_COPY_CREDIT_CARD = 'copy-credit-card';

    public const ADDRESS_PROOF_CREDIT_CARD_STATEMENT = 'credit-card-statement';

    public const ADDRESS_PROOF_BANK_STATEMENT = 'bank-statement';

    public const ADDRESS_PROOF_INHERITANCE_DOCUMENTATION = 'inheritance-documentation';

    public const ADDRESS_PROOF_TAX_RETURN = 'tax-return';

    public const ADDRESS_PROOF_SALARY_SLIP = 'salary-slip';

    public const ADDRESS_PROOF_SALE_OF_ASSETS = 'sale-of-assets';

    public const ADDRESS_PROOF_PUBLIC_HEALTH_CARD = 'public-health-card';

    public const ADDRESS_PROOF_PROOF_OF_AGE_CARD = 'proof-of-age-card';

    public const ADDRESS_PROOF_REVERSE_OF_ID = 'reverse-of-id';

    public const ADDRESS_PROOF_PUBLIC_SERVICE = 'public-service';

    public const ADDRESS_PROOF_EWALLET_HOLDER_DETAILS = 'ewallet-holder-details';

    public const ADDRESS_PROOF_EWALLET_TRANSACTION_STATEMENT = 'ewallet-transaction-statement';

    public const ADDRESS_PROOF_MARRIAGE_CERTIFICATE = 'marriage-certificate';

    public const ADDRESS_PROOF_FIREARMS_LICENSE = 'firearms-license';

    public const ADDRESS_PROOF_INSURANCE_LETTER = 'insurance-letter';

    public const ADDRESS_PROOF_INCOME_STATEMENT = 'income-statement';

    public const ADDRESS_PROOF_DEBTORS_LETTER = 'debtors-letter';

    public const ADDRESS_PROOF_OTHER = 'other';

    public const ADDRESS_PROOF_NULL = 'null';

    public const FUNDS_PROOF_PASSPORT = 'passport';

    public const FUNDS_PROOF_ID_CARD = 'id-card';

    public const FUNDS_PROOF_DRIVER_LICENSE = 'driver-license';

    public const FUNDS_PROOF_BIRTH_CERTIFICATE = 'birth-certificate';

    public const FUNDS_PROOF_UTILITY_BILL = 'utility-bill';

    public const FUNDS_PROOF_RENTAL_RECEIPT = 'rental-receipt';

    public const FUNDS_PROOF_LEASE_AGREEMENT = 'lease-agreement';

    public const FUNDS_PROOF_COPY_CREDIT_CARD = 'copy-credit-card';

    public const FUNDS_PROOF_CREDIT_CARD_STATEMENT = 'credit-card-statement';

    public const FUNDS_PROOF_BANK_STATEMENT = 'bank-statement';

    public const FUNDS_PROOF_INHERITANCE_DOCUMENTATION = 'inheritance-documentation';

    public const FUNDS_PROOF_TAX_RETURN = 'tax-return';

    public const FUNDS_PROOF_SALARY_SLIP = 'salary-slip';

    public const FUNDS_PROOF_SALE_OF_ASSETS = 'sale-of-assets';

    public const FUNDS_PROOF_PUBLIC_HEALTH_CARD = 'public-health-card';

    public const FUNDS_PROOF_PROOF_OF_AGE_CARD = 'proof-of-age-card';

    public const FUNDS_PROOF_REVERSE_OF_ID = 'reverse-of-id';

    public const FUNDS_PROOF_PUBLIC_SERVICE = 'public-service';

    public const FUNDS_PROOF_EWALLET_HOLDER_DETAILS = 'ewallet-holder-details';

    public const FUNDS_PROOF_EWALLET_TRANSACTION_STATEMENT = 'ewallet-transaction-statement';

    public const FUNDS_PROOF_MARRIAGE_CERTIFICATE = 'marriage-certificate';

    public const FUNDS_PROOF_FIREARMS_LICENSE = 'firearms-license';

    public const FUNDS_PROOF_INSURANCE_LETTER = 'insurance-letter';

    public const FUNDS_PROOF_INCOME_STATEMENT = 'income-statement';

    public const FUNDS_PROOF_DEBTORS_LETTER = 'debtors-letter';

    public const FUNDS_PROOF_OTHER = 'other';

    public const FUNDS_PROOF_NULL = 'null';

    public const PURCHASE_PROOF_PASSPORT = 'passport';

    public const PURCHASE_PROOF_ID_CARD = 'id-card';

    public const PURCHASE_PROOF_DRIVER_LICENSE = 'driver-license';

    public const PURCHASE_PROOF_BIRTH_CERTIFICATE = 'birth-certificate';

    public const PURCHASE_PROOF_UTILITY_BILL = 'utility-bill';

    public const PURCHASE_PROOF_RENTAL_RECEIPT = 'rental-receipt';

    public const PURCHASE_PROOF_LEASE_AGREEMENT = 'lease-agreement';

    public const PURCHASE_PROOF_COPY_CREDIT_CARD = 'copy-credit-card';

    public const PURCHASE_PROOF_CREDIT_CARD_STATEMENT = 'credit-card-statement';

    public const PURCHASE_PROOF_BANK_STATEMENT = 'bank-statement';

    public const PURCHASE_PROOF_INHERITANCE_DOCUMENTATION = 'inheritance-documentation';

    public const PURCHASE_PROOF_TAX_RETURN = 'tax-return';

    public const PURCHASE_PROOF_SALARY_SLIP = 'salary-slip';

    public const PURCHASE_PROOF_SALE_OF_ASSETS = 'sale-of-assets';

    public const PURCHASE_PROOF_PUBLIC_HEALTH_CARD = 'public-health-card';

    public const PURCHASE_PROOF_PROOF_OF_AGE_CARD = 'proof-of-age-card';

    public const PURCHASE_PROOF_REVERSE_OF_ID = 'reverse-of-id';

    public const PURCHASE_PROOF_PUBLIC_SERVICE = 'public-service';

    public const PURCHASE_PROOF_EWALLET_HOLDER_DETAILS = 'ewallet-holder-details';

    public const PURCHASE_PROOF_EWALLET_TRANSACTION_STATEMENT = 'ewallet-transaction-statement';

    public const PURCHASE_PROOF_MARRIAGE_CERTIFICATE = 'marriage-certificate';

    public const PURCHASE_PROOF_FIREARMS_LICENSE = 'firearms-license';

    public const PURCHASE_PROOF_INSURANCE_LETTER = 'insurance-letter';

    public const PURCHASE_PROOF_INCOME_STATEMENT = 'income-statement';

    public const PURCHASE_PROOF_DEBTORS_LETTER = 'debtors-letter';

    public const PURCHASE_PROOF_OTHER = 'other';

    public const PURCHASE_PROOF_NULL = 'null';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('identityProof', $data)) {
            $this->setIdentityProof($data['identityProof']);
        }
        if (array_key_exists('addressProof', $data)) {
            $this->setAddressProof($data['addressProof']);
        }
        if (array_key_exists('fundsProof', $data)) {
            $this->setFundsProof($data['fundsProof']);
        }
        if (array_key_exists('purchaseProof', $data)) {
            $this->setPurchaseProof($data['purchaseProof']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    /**
     * @return null|null[]|string[]
     */
    public function getIdentityProof(): ?array
    {
        return $this->fields['identityProof'] ?? null;
    }

    /**
     * @param null|null[]|string[] $identityProof
     */
    public function setIdentityProof(null|array $identityProof): static
    {
        $this->fields['identityProof'] = $identityProof;

        return $this;
    }

    /**
     * @return null|null[]|string[]
     */
    public function getAddressProof(): ?array
    {
        return $this->fields['addressProof'] ?? null;
    }

    /**
     * @param null|null[]|string[] $addressProof
     */
    public function setAddressProof(null|array $addressProof): static
    {
        $this->fields['addressProof'] = $addressProof;

        return $this;
    }

    /**
     * @return null|null[]|string[]
     */
    public function getFundsProof(): ?array
    {
        return $this->fields['fundsProof'] ?? null;
    }

    /**
     * @param null|null[]|string[] $fundsProof
     */
    public function setFundsProof(null|array $fundsProof): static
    {
        $this->fields['fundsProof'] = $fundsProof;

        return $this;
    }

    /**
     * @return null|null[]|string[]
     */
    public function getPurchaseProof(): ?array
    {
        return $this->fields['purchaseProof'] ?? null;
    }

    /**
     * @param null|null[]|string[] $purchaseProof
     */
    public function setPurchaseProof(null|array $purchaseProof): static
    {
        $this->fields['purchaseProof'] = $purchaseProof;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('identityProof', $this->fields)) {
            $data['identityProof'] = $this->fields['identityProof'];
        }
        if (array_key_exists('addressProof', $this->fields)) {
            $data['addressProof'] = $this->fields['addressProof'];
        }
        if (array_key_exists('fundsProof', $this->fields)) {
            $data['fundsProof'] = $this->fields['fundsProof'];
        }
        if (array_key_exists('purchaseProof', $this->fields)) {
            $data['purchaseProof'] = $this->fields['purchaseProof'];
        }

        return $data;
    }
}
