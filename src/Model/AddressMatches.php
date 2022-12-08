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
use JsonSerializable;

class AddressMatches implements JsonSerializable
{
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function setFirstName(null|string $firstName): self
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function setLastName(null|string $lastName): self
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function getLine1(): ?string
    {
        return $this->fields['line1'] ?? null;
    }

    public function setLine1(null|string $line1): self
    {
        $this->fields['line1'] = $line1;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function setCity(null|string $city): self
    {
        $this->fields['city'] = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function setRegion(null|string $region): self
    {
        $this->fields['region'] = $region;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->fields['postalCode'] ?? null;
    }

    public function setPostalCode(null|string $postalCode): self
    {
        $this->fields['postalCode'] = $postalCode;

        return $this;
    }

    public function getWordCount(): ?int
    {
        return $this->fields['wordCount'] ?? null;
    }

    public function setWordCount(null|int $wordCount): self
    {
        $this->fields['wordCount'] = $wordCount;

        return $this;
    }

    public function getUniqueWords(): ?int
    {
        return $this->fields['uniqueWords'] ?? null;
    }

    public function setUniqueWords(null|int $uniqueWords): self
    {
        $this->fields['uniqueWords'] = $uniqueWords;

        return $this;
    }

    public function getDate(): ?DateTimeImmutable
    {
        return $this->fields['date'] ?? null;
    }

    public function setDate(null|DateTimeImmutable|string $date): self
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

    public function setPhone(null|string $phone): self
    {
        $this->fields['phone'] = $phone;

        return $this;
    }

    public function getDocumentSubtype(): ?KycDocumentSubtypes
    {
        return $this->fields['documentSubtype'] ?? null;
    }

    public function setDocumentSubtype(null|KycDocumentSubtypes|string $documentSubtype): self
    {
        if ($documentSubtype !== null && !($documentSubtype instanceof KycDocumentSubtypes)) {
            $documentSubtype = KycDocumentSubtypes::from($documentSubtype);
        }

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
            $data['documentSubtype'] = $this->fields['documentSubtype']?->value;
        }

        return $data;
    }
}
