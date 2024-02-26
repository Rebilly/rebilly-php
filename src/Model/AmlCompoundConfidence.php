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

class AmlCompoundConfidence implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('addressMatch', $data)) {
            $this->setAddressMatch($data['addressMatch']);
        }
        if (array_key_exists('addressMismatch', $data)) {
            $this->setAddressMismatch($data['addressMismatch']);
        }
        if (array_key_exists('noAddress', $data)) {
            $this->setNoAddress($data['noAddress']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getAddressMatch(): ?AmlCompoundConfidenceAddressMatch
    {
        return $this->fields['addressMatch'] ?? null;
    }

    public function setAddressMatch(null|AmlCompoundConfidenceAddressMatch|array $addressMatch): static
    {
        if ($addressMatch !== null && !($addressMatch instanceof AmlCompoundConfidenceAddressMatch)) {
            $addressMatch = AmlCompoundConfidenceAddressMatch::from($addressMatch);
        }

        $this->fields['addressMatch'] = $addressMatch;

        return $this;
    }

    public function getAddressMismatch(): ?AmlCompoundConfidenceAddressMismatch
    {
        return $this->fields['addressMismatch'] ?? null;
    }

    public function setAddressMismatch(null|AmlCompoundConfidenceAddressMismatch|array $addressMismatch): static
    {
        if ($addressMismatch !== null && !($addressMismatch instanceof AmlCompoundConfidenceAddressMismatch)) {
            $addressMismatch = AmlCompoundConfidenceAddressMismatch::from($addressMismatch);
        }

        $this->fields['addressMismatch'] = $addressMismatch;

        return $this;
    }

    public function getNoAddress(): ?AmlCompoundConfidenceNoAddress
    {
        return $this->fields['noAddress'] ?? null;
    }

    public function setNoAddress(null|AmlCompoundConfidenceNoAddress|array $noAddress): static
    {
        if ($noAddress !== null && !($noAddress instanceof AmlCompoundConfidenceNoAddress)) {
            $noAddress = AmlCompoundConfidenceNoAddress::from($noAddress);
        }

        $this->fields['noAddress'] = $noAddress;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('addressMatch', $this->fields)) {
            $data['addressMatch'] = $this->fields['addressMatch']?->jsonSerialize();
        }
        if (array_key_exists('addressMismatch', $this->fields)) {
            $data['addressMismatch'] = $this->fields['addressMismatch']?->jsonSerialize();
        }
        if (array_key_exists('noAddress', $this->fields)) {
            $data['noAddress'] = $this->fields['noAddress']?->jsonSerialize();
        }

        return $data;
    }
}
