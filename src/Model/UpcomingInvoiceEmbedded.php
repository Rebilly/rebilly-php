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

class UpcomingInvoiceEmbedded implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('customer', $data)) {
            $this->setCustomer($data['customer']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
        }
        if (array_key_exists('organization', $data)) {
            $this->setOrganization($data['organization']);
        }
        if (array_key_exists('leadSource', $data)) {
            $this->setLeadSource($data['leadSource']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCustomer(): null|object|array
    {
        return $this->fields['customer'] ?? null;
    }

    public function setCustomer(null|object|array $customer): static
    {
        $this->fields['customer'] = $customer;

        return $this;
    }

    public function getWebsite(): null|object|array
    {
        return $this->fields['website'] ?? null;
    }

    public function setWebsite(null|object|array $website): static
    {
        $this->fields['website'] = $website;

        return $this;
    }

    public function getOrganization(): null|object|array
    {
        return $this->fields['organization'] ?? null;
    }

    public function setOrganization(null|object|array $organization): static
    {
        $this->fields['organization'] = $organization;

        return $this;
    }

    public function getLeadSource(): null|object|array
    {
        return $this->fields['leadSource'] ?? null;
    }

    public function setLeadSource(null|object|array $leadSource): static
    {
        $this->fields['leadSource'] = $leadSource;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('customer', $this->fields)) {
            $data['customer'] = $this->fields['customer'];
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website'];
        }
        if (array_key_exists('organization', $this->fields)) {
            $data['organization'] = $this->fields['organization'];
        }
        if (array_key_exists('leadSource', $this->fields)) {
            $data['leadSource'] = $this->fields['leadSource'];
        }

        return $data;
    }
}
