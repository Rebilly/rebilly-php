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

class InvoiceTaxItemJurisdictions implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('state', $data)) {
            $this->setState($data['state']);
        }
        if (array_key_exists('county', $data)) {
            $this->setCounty($data['county']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
    }

    public function getState(): ?string
    {
        return $this->fields['state'] ?? null;
    }

    public function getCounty(): ?string
    {
        return $this->fields['county'] ?? null;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('state', $this->fields)) {
            $data['state'] = $this->fields['state'];
        }
        if (array_key_exists('county', $this->fields)) {
            $data['county'] = $this->fields['county'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }

        return $data;
    }

    private function setCountry(null|string $country): self
    {
        $this->fields['country'] = $country;

        return $this;
    }

    private function setState(null|string $state): self
    {
        $this->fields['state'] = $state;

        return $this;
    }

    private function setCounty(null|string $county): self
    {
        $this->fields['county'] = $county;

        return $this;
    }

    private function setCity(null|string $city): self
    {
        $this->fields['city'] = $city;

        return $this;
    }
}
