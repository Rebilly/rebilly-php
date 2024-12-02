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
    public const UI_VERSION_1 = '1';

    public const UI_VERSION_2 = '2';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('identityProof', $data)) {
            $this->setIdentityProof($data['identityProof']);
        }
        if (array_key_exists('addressProof', $data)) {
            $this->setAddressProof($data['addressProof']);
        }
        if (array_key_exists('uiVersion', $data)) {
            $this->setUiVersion($data['uiVersion']);
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

    public function setIdentityProof(null|KycSettingsIdentity|array $identityProof): static
    {
        if ($identityProof !== null && !($identityProof instanceof KycSettingsIdentity)) {
            $identityProof = KycSettingsIdentity::from($identityProof);
        }

        $this->fields['identityProof'] = $identityProof;

        return $this;
    }

    public function getAddressProof(): ?KycSettingsAddress
    {
        return $this->fields['addressProof'] ?? null;
    }

    public function setAddressProof(null|KycSettingsAddress|array $addressProof): static
    {
        if ($addressProof !== null && !($addressProof instanceof KycSettingsAddress)) {
            $addressProof = KycSettingsAddress::from($addressProof);
        }

        $this->fields['addressProof'] = $addressProof;

        return $this;
    }

    public function getUiVersion(): ?string
    {
        return $this->fields['uiVersion'] ?? null;
    }

    public function setUiVersion(null|string $uiVersion): static
    {
        $this->fields['uiVersion'] = $uiVersion;

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
        if (array_key_exists('uiVersion', $this->fields)) {
            $data['uiVersion'] = $this->fields['uiVersion'];
        }

        return $data;
    }
}
