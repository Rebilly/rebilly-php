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

class KycSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('identityProof', $data)) {
            $this->setIdentityProof($data['identityProof']);
        }
        if (array_key_exists('addressProof', $data)) {
            $this->setAddressProof($data['addressProof']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getIdentityProof(): ?KycSettingsIdentity
    {
        return $this->fields['identityProof'] ?? null;
    }

    public function setIdentityProof(null|KycSettingsIdentity|array $identityProof): self
    {
        if ($identityProof !== null && !($identityProof instanceof \Rebilly\Sdk\Model\KycSettingsIdentity)) {
            $identityProof = \Rebilly\Sdk\Model\KycSettingsIdentity::from($identityProof);
        }

        $this->fields['identityProof'] = $identityProof;

        return $this;
    }

    public function getAddressProof(): ?KycSettingsAddress
    {
        return $this->fields['addressProof'] ?? null;
    }

    public function setAddressProof(null|KycSettingsAddress|array $addressProof): self
    {
        if ($addressProof !== null && !($addressProof instanceof \Rebilly\Sdk\Model\KycSettingsAddress)) {
            $addressProof = \Rebilly\Sdk\Model\KycSettingsAddress::from($addressProof);
        }

        $this->fields['addressProof'] = $addressProof;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('identityProof', $this->fields)) {
            $data['identityProof'] = $this->fields['identityProof']?->jsonSerialize();
        }
        if (array_key_exists('addressProof', $this->fields)) {
            $data['addressProof'] = $this->fields['addressProof']?->jsonSerialize();
        }

        return $data;
    }
}
