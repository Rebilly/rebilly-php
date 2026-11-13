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

class ScopedKycSettings implements JsonSerializable
{
    use HasMetadata;

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
        if (array_key_exists('websiteOverrides', $data)) {
            $this->setWebsiteOverrides($data['websiteOverrides']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
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

    /**
     * @return null|ScopedKycSettingsWebsiteOverride[]
     */
    public function getWebsiteOverrides(): ?array
    {
        return $this->fields['websiteOverrides'] ?? null;
    }

    /**
     * @param null|array[]|ScopedKycSettingsWebsiteOverride[] $websiteOverrides
     */
    public function setWebsiteOverrides(null|array $websiteOverrides): static
    {
        $websiteOverrides = $websiteOverrides !== null ? array_map(
            fn ($value) => $value instanceof ScopedKycSettingsWebsiteOverride ? $value : ScopedKycSettingsWebsiteOverride::from($value),
            $websiteOverrides,
        ) : null;

        $this->fields['websiteOverrides'] = $websiteOverrides;

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
        if (array_key_exists('fundsProof', $this->fields)) {
            $data['fundsProof'] = $this->fields['fundsProof']?->jsonSerialize();
        }
        if (array_key_exists('purchaseProof', $this->fields)) {
            $data['purchaseProof'] = $this->fields['purchaseProof']?->jsonSerialize();
        }
        if (array_key_exists('websiteOverrides', $this->fields)) {
            $data['websiteOverrides'] = $this->fields['websiteOverrides'] !== null
                ? array_map(
                    static fn (ScopedKycSettingsWebsiteOverride $scopedKycSettingsWebsiteOverride) => $scopedKycSettingsWebsiteOverride->jsonSerialize(),
                    $this->fields['websiteOverrides'],
                )
                : null;
        }

        return $data;
    }
}
