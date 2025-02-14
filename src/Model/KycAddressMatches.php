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

use DateTimeImmutable;

class KycAddressMatches implements PostKycDocumentMatchesRequest
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
        if (array_key_exists('line1', $data)) {
            $this->setLine1($data['line1']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('postalCode', $data)) {
            $this->setPostalCode($data['postalCode']);
        }
        if (array_key_exists('wordCount', $data)) {
            $this->setWordCount($data['wordCount']);
        }
        if (array_key_exists('uniqueWords', $data)) {
            $this->setUniqueWords($data['uniqueWords']);
        }
        if (array_key_exists('date', $data)) {
            $this->setDate($data['date']);
        }
        if (array_key_exists('phone', $data)) {
            $this->setPhone($data['phone']);
        }
        if (array_key_exists('documentSubtype', $data)) {
            $this->setDocumentSubtype($data['documentSubtype']);
        }
        if (array_key_exists('isTampered', $data)) {
            $this->setIsTampered($data['isTampered']);
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

    public function getLine1(): ?string
    {
        return $this->fields['line1'] ?? null;
    }

    public function setLine1(null|string $line1): static
    {
        $this->fields['line1'] = $line1;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function setCity(null|string $city): static
    {
        $this->fields['city'] = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function setRegion(null|string $region): static
    {
        $this->fields['region'] = $region;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->fields['postalCode'] ?? null;
    }

    public function setPostalCode(null|string $postalCode): static
    {
        $this->fields['postalCode'] = $postalCode;

        return $this;
    }

    public function getWordCount(): ?int
    {
        return $this->fields['wordCount'] ?? null;
    }

    public function setWordCount(null|int $wordCount): static
    {
        $this->fields['wordCount'] = $wordCount;

        return $this;
    }

    public function getUniqueWords(): ?int
    {
        return $this->fields['uniqueWords'] ?? null;
    }

    public function setUniqueWords(null|int $uniqueWords): static
    {
        $this->fields['uniqueWords'] = $uniqueWords;

        return $this;
    }

    public function getDate(): ?DateTimeImmutable
    {
        return $this->fields['date'] ?? null;
    }

    public function setDate(null|DateTimeImmutable|string $date): static
    {
        if ($date !== null && !($date instanceof DateTimeImmutable)) {
            $date = new DateTimeImmutable($date);
        }

        $this->fields['date'] = $date;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->fields['phone'] ?? null;
    }

    public function setPhone(null|string $phone): static
    {
        $this->fields['phone'] = $phone;

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

    public function getIsTampered(): ?bool
    {
        return $this->fields['isTampered'] ?? null;
    }

    public function setIsTampered(null|bool $isTampered): static
    {
        $this->fields['isTampered'] = $isTampered;

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
        if (array_key_exists('line1', $this->fields)) {
            $data['line1'] = $this->fields['line1'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('postalCode', $this->fields)) {
            $data['postalCode'] = $this->fields['postalCode'];
        }
        if (array_key_exists('wordCount', $this->fields)) {
            $data['wordCount'] = $this->fields['wordCount'];
        }
        if (array_key_exists('uniqueWords', $this->fields)) {
            $data['uniqueWords'] = $this->fields['uniqueWords'];
        }
        if (array_key_exists('date', $this->fields)) {
            $data['date'] = $this->fields['date']?->format('Y-m-d');
        }
        if (array_key_exists('phone', $this->fields)) {
            $data['phone'] = $this->fields['phone'];
        }
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype'];
        }
        if (array_key_exists('isTampered', $this->fields)) {
            $data['isTampered'] = $this->fields['isTampered'];
        }

        return $data;
    }
}
