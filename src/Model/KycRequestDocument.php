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

class KycRequestDocument implements JsonSerializable
{
    public const TYPE_IDENTITY_PROOF = 'identity-proof';

    public const TYPE_ADDRESS_PROOF = 'address-proof';

    public const TYPE_FUNDS_PROOF = 'funds-proof';

    public const TYPE_PURCHASE_PROOF = 'purchase-proof';

    public const TYPE_CREDIT_FILE_PROOF = 'credit-file-proof';

    public const SUBTYPES_PASSPORT = 'passport';

    public const SUBTYPES_ID_CARD = 'id-card';

    public const SUBTYPES_DRIVER_LICENSE = 'driver-license';

    public const SUBTYPES_BIRTH_CERTIFICATE = 'birth-certificate';

    public const SUBTYPES_UTILITY_BILL = 'utility-bill';

    public const SUBTYPES_RENTAL_RECEIPT = 'rental-receipt';

    public const SUBTYPES_LEASE_AGREEMENT = 'lease-agreement';

    public const SUBTYPES_COPY_CREDIT_CARD = 'copy-credit-card';

    public const SUBTYPES_CREDIT_CARD_STATEMENT = 'credit-card-statement';

    public const SUBTYPES_BANK_STATEMENT = 'bank-statement';

    public const SUBTYPES_INHERITANCE_DOCUMENTATION = 'inheritance-documentation';

    public const SUBTYPES_TAX_RETURN = 'tax-return';

    public const SUBTYPES_SALARY_SLIP = 'salary-slip';

    public const SUBTYPES_SALE_OF_ASSETS = 'sale-of-assets';

    public const SUBTYPES_PUBLIC_HEALTH_CARD = 'public-health-card';

    public const SUBTYPES_PROOF_OF_AGE_CARD = 'proof-of-age-card';

    public const SUBTYPES_REVERSE_OF_ID = 'reverse-of-id';

    public const SUBTYPES_PUBLIC_SERVICE = 'public-service';

    public const SUBTYPES_EWALLET_HOLDER_DETAILS = 'ewallet-holder-details';

    public const SUBTYPES_EWALLET_TRANSACTION_STATEMENT = 'ewallet-transaction-statement';

    public const SUBTYPES_MARRIAGE_CERTIFICATE = 'marriage-certificate';

    public const SUBTYPES_FIREARMS_LICENSE = 'firearms-license';

    public const SUBTYPES_INSURANCE_LETTER = 'insurance-letter';

    public const SUBTYPES_INCOME_STATEMENT = 'income-statement';

    public const SUBTYPES_DEBTORS_LETTER = 'debtors-letter';

    public const SUBTYPES_OTHER = 'other';

    public const SUBTYPES_NULL = 'null';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('subtypes', $data)) {
            $this->setSubtypes($data['subtypes']);
        }
        if (array_key_exists('maxAttempts', $data)) {
            $this->setMaxAttempts($data['maxAttempts']);
        }
        if (array_key_exists('faceProofRequired', $data)) {
            $this->setFaceProofRequired($data['faceProofRequired']);
        }
        if (array_key_exists('faceLivenessRequired', $data)) {
            $this->setFaceLivenessRequired($data['faceLivenessRequired']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): string
    {
        return $this->fields['type'];
    }

    public function setType(string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @return null|null[]|string[]
     */
    public function getSubtypes(): ?array
    {
        return $this->fields['subtypes'] ?? null;
    }

    /**
     * @param null|null[]|string[] $subtypes
     */
    public function setSubtypes(null|array $subtypes): static
    {
        $this->fields['subtypes'] = $subtypes;

        return $this;
    }

    public function getMaxAttempts(): ?int
    {
        return $this->fields['maxAttempts'] ?? null;
    }

    public function setMaxAttempts(null|int $maxAttempts): static
    {
        $this->fields['maxAttempts'] = $maxAttempts;

        return $this;
    }

    public function getFaceProofRequired(): ?bool
    {
        return $this->fields['faceProofRequired'] ?? null;
    }

    public function setFaceProofRequired(null|bool $faceProofRequired): static
    {
        $this->fields['faceProofRequired'] = $faceProofRequired;

        return $this;
    }

    public function getFaceLivenessRequired(): ?bool
    {
        return $this->fields['faceLivenessRequired'] ?? null;
    }

    public function setFaceLivenessRequired(null|bool $faceLivenessRequired): static
    {
        $this->fields['faceLivenessRequired'] = $faceLivenessRequired;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('subtypes', $this->fields)) {
            $data['subtypes'] = $this->fields['subtypes'];
        }
        if (array_key_exists('maxAttempts', $this->fields)) {
            $data['maxAttempts'] = $this->fields['maxAttempts'];
        }
        if (array_key_exists('faceProofRequired', $this->fields)) {
            $data['faceProofRequired'] = $this->fields['faceProofRequired'];
        }
        if (array_key_exists('faceLivenessRequired', $this->fields)) {
            $data['faceLivenessRequired'] = $this->fields['faceLivenessRequired'];
        }

        return $data;
    }
}
