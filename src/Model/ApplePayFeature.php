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

class ApplePayFeature implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('displayName', $data)) {
            $this->setDisplayName($data['displayName']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /** @return array<0: self, 1: int> **/
    public static function tryFrom(array $data = []): ?array
    {
        try {
            $instance = self::from($data);

            return [$instance, count(array_intersect_key($data, $instance->jsonSerialize()))];
        } catch (\InvalidArgumentException) {
        }

        return null;
    }

    public function getName(): ?ApplePayFeatureName
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|ApplePayFeatureName|string $name): self
    {
        if ($name !== null && !($name instanceof \Rebilly\Sdk\Model\ApplePayFeatureName)) {
            $name = \Rebilly\Sdk\Model\ApplePayFeatureName::from($name);
        }

        $this->fields['name'] = $name;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->fields['displayName'] ?? null;
    }

    public function setDisplayName(null|string $displayName): self
    {
        $this->fields['displayName'] = $displayName;

        return $this;
    }

    public function getCountry(): ?DigitalWalletCountry
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|DigitalWalletCountry|array $country): self
    {
        if ($country !== null && !($country instanceof \Rebilly\Sdk\Model\DigitalWalletCountry)) {
            $country = \Rebilly\Sdk\Model\DigitalWalletCountry::from($country);
        }

        $this->fields['country'] = $country;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name']?->value;
        }
        if (array_key_exists('displayName', $this->fields)) {
            $data['displayName'] = $this->fields['displayName'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country']?->jsonSerialize();
        }

        return $data;
    }
}
