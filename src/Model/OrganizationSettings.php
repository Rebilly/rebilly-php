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

class OrganizationSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('defaultTaxCalculator', $data)) {
            $this->setDefaultTaxCalculator($data['defaultTaxCalculator']);
        }
        if (array_key_exists('billing', $data)) {
            $this->setBilling($data['billing']);
        }
        if (array_key_exists('taxLocations', $data)) {
            $this->setTaxLocations($data['taxLocations']);
        }
        if (array_key_exists('notifications', $data)) {
            $this->setNotifications($data['notifications']);
        }
        if (array_key_exists('payoutRequestAllocationOrder', $data)) {
            $this->setPayoutRequestAllocationOrder($data['payoutRequestAllocationOrder']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getDefaultTaxCalculator(): ?OrganizationSettingsDefaultTaxCalculator
    {
        return $this->fields['defaultTaxCalculator'] ?? null;
    }

    public function setDefaultTaxCalculator(null|OrganizationSettingsDefaultTaxCalculator|array $defaultTaxCalculator): static
    {
        if ($defaultTaxCalculator !== null && !($defaultTaxCalculator instanceof OrganizationSettingsDefaultTaxCalculator)) {
            $defaultTaxCalculator = OrganizationSettingsDefaultTaxCalculator::from($defaultTaxCalculator);
        }

        $this->fields['defaultTaxCalculator'] = $defaultTaxCalculator;

        return $this;
    }

    public function getBilling(): ?OrganizationSettingsBilling
    {
        return $this->fields['billing'] ?? null;
    }

    public function setBilling(null|OrganizationSettingsBilling|array $billing): static
    {
        if ($billing !== null && !($billing instanceof OrganizationSettingsBilling)) {
            $billing = OrganizationSettingsBilling::from($billing);
        }

        $this->fields['billing'] = $billing;

        return $this;
    }

    /**
     * @return null|OrganizationSettingsTaxLocations[]
     */
    public function getTaxLocations(): ?array
    {
        return $this->fields['taxLocations'] ?? null;
    }

    /**
     * @param null|array[]|OrganizationSettingsTaxLocations[] $taxLocations
     */
    public function setTaxLocations(null|array $taxLocations): static
    {
        $taxLocations = $taxLocations !== null ? array_map(
            fn ($value) => $value instanceof OrganizationSettingsTaxLocations ? $value : OrganizationSettingsTaxLocations::from($value),
            $taxLocations,
        ) : null;

        $this->fields['taxLocations'] = $taxLocations;

        return $this;
    }

    public function getNotifications(): ?OrganizationSettingsNotifications
    {
        return $this->fields['notifications'] ?? null;
    }

    public function setNotifications(null|OrganizationSettingsNotifications|array $notifications): static
    {
        if ($notifications !== null && !($notifications instanceof OrganizationSettingsNotifications)) {
            $notifications = OrganizationSettingsNotifications::from($notifications);
        }

        $this->fields['notifications'] = $notifications;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getPayoutRequestAllocationOrder(): ?array
    {
        return $this->fields['payoutRequestAllocationOrder'] ?? null;
    }

    /**
     * @param null|string[] $payoutRequestAllocationOrder
     */
    public function setPayoutRequestAllocationOrder(null|array $payoutRequestAllocationOrder): static
    {
        $this->fields['payoutRequestAllocationOrder'] = $payoutRequestAllocationOrder;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('defaultTaxCalculator', $this->fields)) {
            $data['defaultTaxCalculator'] = $this->fields['defaultTaxCalculator']?->jsonSerialize();
        }
        if (array_key_exists('billing', $this->fields)) {
            $data['billing'] = $this->fields['billing']?->jsonSerialize();
        }
        if (array_key_exists('taxLocations', $this->fields)) {
            $data['taxLocations'] = $this->fields['taxLocations'] !== null
                ? array_map(
                    static fn (OrganizationSettingsTaxLocations $organizationSettingsTaxLocations) => $organizationSettingsTaxLocations->jsonSerialize(),
                    $this->fields['taxLocations'],
                )
                : null;
        }
        if (array_key_exists('notifications', $this->fields)) {
            $data['notifications'] = $this->fields['notifications']?->jsonSerialize();
        }
        if (array_key_exists('payoutRequestAllocationOrder', $this->fields)) {
            $data['payoutRequestAllocationOrder'] = $this->fields['payoutRequestAllocationOrder'];
        }

        return $data;
    }
}
