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

class ScopedKycSettingsWebsiteOverride implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('websiteIds', $data)) {
            $this->setWebsiteIds($data['websiteIds']);
        }
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
     * @return string[]
     */
    public function getWebsiteIds(): array
    {
        return $this->fields['websiteIds'];
    }

    /**
     * @param string[] $websiteIds
     */
    public function setWebsiteIds(array $websiteIds): static
    {
        $this->fields['websiteIds'] = $websiteIds;

        return $this;
    }

    public function getIdentityProof(): ?ScopedKycSettingsProofBlock
    {
        return $this->fields['identityProof'] ?? null;
    }

    public function setIdentityProof(null|ScopedKycSettingsProofBlock|array $identityProof): static
    {
        if ($identityProof !== null && !($identityProof instanceof ScopedKycSettingsProofBlock)) {
            $identityProof = ScopedKycSettingsProofBlock::from($identityProof);
        }

        $this->fields['identityProof'] = $identityProof;

        return $this;
    }

    public function getAddressProof(): ?ScopedKycSettingsProofBlock
    {
        return $this->fields['addressProof'] ?? null;
    }

    public function setAddressProof(null|ScopedKycSettingsProofBlock|array $addressProof): static
    {
        if ($addressProof !== null && !($addressProof instanceof ScopedKycSettingsProofBlock)) {
            $addressProof = ScopedKycSettingsProofBlock::from($addressProof);
        }

        $this->fields['addressProof'] = $addressProof;

        return $this;
    }

    public function getFundsProof(): ?ScopedKycSettingsProofBlock
    {
        return $this->fields['fundsProof'] ?? null;
    }

    public function setFundsProof(null|ScopedKycSettingsProofBlock|array $fundsProof): static
    {
        if ($fundsProof !== null && !($fundsProof instanceof ScopedKycSettingsProofBlock)) {
            $fundsProof = ScopedKycSettingsProofBlock::from($fundsProof);
        }

        $this->fields['fundsProof'] = $fundsProof;

        return $this;
    }

    public function getPurchaseProof(): ?ScopedKycSettingsProofBlock
    {
        return $this->fields['purchaseProof'] ?? null;
    }

    public function setPurchaseProof(null|ScopedKycSettingsProofBlock|array $purchaseProof): static
    {
        if ($purchaseProof !== null && !($purchaseProof instanceof ScopedKycSettingsProofBlock)) {
            $purchaseProof = ScopedKycSettingsProofBlock::from($purchaseProof);
        }

        $this->fields['purchaseProof'] = $purchaseProof;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('websiteIds', $this->fields)) {
            $data['websiteIds'] = $this->fields['websiteIds'];
        }
        if (array_key_exists('identityProof', $this->fields)) {
            $data['identityProof'] = $this->fields['identityProof']?->jsonSerialize();
        }
        if (array_key_exists('addressProof', $this->fields)) {
            $data['addressProof'] = $this->fields['addressProof']?->jsonSerialize();
        }
        if (array_key_exists('fundsProof', $this->fields)) {
            $data['fundsProof'] = $this->fields['fundsProof']?->jsonSerialize();
        }
        if (array_key_exists('purchaseProof', $this->fields)) {
            $data['purchaseProof'] = $this->fields['purchaseProof']?->jsonSerialize();
        }

        return $data;
    }
}
