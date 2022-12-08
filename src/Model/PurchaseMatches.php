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

    public function getPaymentInstrumentId(): ?string
    {
        return $this->fields['paymentInstrumentId'] ?? null;
    }

    public function setPaymentInstrumentId(null|string $paymentInstrumentId): self
    {
        $this->fields['paymentInstrumentId'] = $paymentInstrumentId;

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
        if (array_key_exists('paymentInstrumentId', $this->fields)) {
            $data['paymentInstrumentId'] = $this->fields['paymentInstrumentId'];
        }
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype']?->value;
        }

        return $data;
    }
}
