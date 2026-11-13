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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;
use Rebilly\Sdk\Trait\HasMetadata;

class Location implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('ip', $data)) {
            $this->setIp($data['ip']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
        if (array_key_exists('location', $data)) {
            $this->setLocation($data['location']);
        }
        if (array_key_exists('zip', $data)) {
            $this->setZip($data['zip']);
        }
        if (array_key_exists('timezone', $data)) {
            $this->setTimezone($data['timezone']);
        }
        if (array_key_exists('time', $data)) {
            $this->setTime($data['time']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getIp(): ?string
    {
        return $this->fields['ip'] ?? null;
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function getLocation(): LocationLocation
    {
        return $this->fields['location'];
    }

    public function setLocation(LocationLocation|array $location): static
    {
        if (!($location instanceof LocationLocation)) {
            $location = LocationLocation::from($location);
        }

        $this->fields['location'] = $location;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->fields['zip'] ?? null;
    }

    public function getTimezone(): ?string
    {
        return $this->fields['timezone'] ?? null;
    }

    public function getTime(): DateTimeImmutable
    {
        return $this->fields['time'];
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('ip', $this->fields)) {
            $data['ip'] = $this->fields['ip'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }
        if (array_key_exists('location', $this->fields)) {
            $data['location'] = $this->fields['location']->jsonSerialize();
        }
        if (array_key_exists('zip', $this->fields)) {
            $data['zip'] = $this->fields['zip'];
        }
        if (array_key_exists('timezone', $this->fields)) {
            $data['timezone'] = $this->fields['timezone'];
        }
        if (array_key_exists('time', $this->fields)) {
            $data['time'] = $this->fields['time']->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setIp(null|string $ip): static
    {
        $this->fields['ip'] = $ip;

        return $this;
    }

    private function setCountry(null|string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }

    private function setRegion(null|string $region): static
    {
        $this->fields['region'] = $region;

        return $this;
    }

    private function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    private function setCity(null|string $city): static
    {
        $this->fields['city'] = $city;

        return $this;
    }

    private function setZip(null|string $zip): static
    {
        $this->fields['zip'] = $zip;

        return $this;
    }

    private function setTimezone(null|string $timezone): static
    {
        $this->fields['timezone'] = $timezone;

        return $this;
    }

    private function setTime(DateTimeImmutable|string $time): static
    {
        if (!($time instanceof DateTimeImmutable)) {
            $time = new DateTimeImmutable($time);
        }

        $this->fields['time'] = $time;

        return $this;
    }
}
