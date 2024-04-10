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

class PurchaseMatches implements JsonSerializable
{
    public const DOCUMENT_SUBTYPE_PASSPORT = 'passport';

    public const DOCUMENT_SUBTYPE_ID_CARD = 'id-card';

    public const DOCUMENT_SUBTYPE_DRIVER_LICENSE = 'driver-license';

    public const DOCUMENT_SUBTYPE_BIRTH_CERTIFICATE = 'birth-certificate';

    public const DOCUMENT_SUBTYPE_UTILITY_BILL = 'utility-bill';

    public const DOCUMENT_SUBTYPE_RENTAL_RECEIPT = 'rental-receipt';

    public const DOCUMENT_SUBTYPE_LEASE_AGREEMENT = 'lease-agreement';

    public const DOCUMENT_SUBTYPE_COPY_CREDIT_CARD = 'copy-credit-card';

    public const DOCUMENT_SUBTYPE_CREDIT_CARD_STATEMENT = 'credit-card-statement';

    public const DOCUMENT_SUBTYPE_BANK_STATEMENT = 'bank-statement';

    public const DOCUMENT_SUBTYPE_INHERITANCE_DOCUMENTATION = 'inheritance-documentation';

    public const DOCUMENT_SUBTYPE_TAX_RETURN = 'tax-return';

    public const DOCUMENT_SUBTYPE_SALARY_SLIP = 'salary-slip';

    public const DOCUMENT_SUBTYPE_SALE_OF_ASSETS = 'sale-of-assets';

    public const DOCUMENT_SUBTYPE_PUBLIC_HEALTH_CARD = 'public-health-card';

    public const DOCUMENT_SUBTYPE_PROOF_OF_AGE_CARD = 'proof-of-age-card';

    public const DOCUMENT_SUBTYPE_REVERSE_OF_ID = 'reverse-of-id';

    public const DOCUMENT_SUBTYPE_PUBLIC_SERVICE = 'public-service';

    public const DOCUMENT_SUBTYPE_EWALLET_HOLDER_DETAILS = 'ewallet-holder-details';

    public const DOCUMENT_SUBTYPE_EWALLET_TRANSACTION_STATEMENT = 'ewallet-transaction-statement';

    public const DOCUMENT_SUBTYPE_MARRIAGE_CERTIFICATE = 'marriage-certificate';

    public const DOCUMENT_SUBTYPE_FIREARMS_LICENSE = 'firearms-license';

    public const DOCUMENT_SUBTYPE_INSURANCE_LETTER = 'insurance-letter';

    public const DOCUMENT_SUBTYPE_INCOME_STATEMENT = 'income-statement';

    public const DOCUMENT_SUBTYPE_DEBTORS_LETTER = 'debtors-letter';

    public const DOCUMENT_SUBTYPE_OTHER = 'other';

    public const DOCUMENT_SUBTYPE_NULL = 'null';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('firstName', $data)) {
            $this->setFirstName($data['firstName']);
        }
        if (array_key_exists('lastName', $data)) {
            $this->setLastName($data['lastName']);
        }
        if (array_key_exists('paymentInstrumentId', $data)) {
            $this->setPaymentInstrumentId($data['paymentInstrumentId']);
        }
        if (array_key_exists('documentSubtype', $data)) {
            $this->setDocumentSubtype($data['documentSubtype']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function setFirstName(null|string $firstName): static
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function setLastName(null|string $lastName): static
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function getPaymentInstrumentId(): ?string
    {
        return $this->fields['paymentInstrumentId'] ?? null;
    }

    public function setPaymentInstrumentId(null|string $paymentInstrumentId): static
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

        return $this;
    }

    public function getDocumentSubtype(): ?string
    {
        return $this->fields['documentSubtype'] ?? null;
    }

    public function setDocumentSubtype(null|string $documentSubtype): static
    {
        $this->fields['documentSubtype'] = $documentSubtype;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype'];
        }

        return $data;
    }
}
