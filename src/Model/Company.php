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

class Company implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('domain', $data)) {
            $this->setDomain($data['domain']);
        }
        if (array_key_exists('yearFounded', $data)) {
            $this->setYearFounded($data['yearFounded']);
        }
        if (array_key_exists('industry', $data)) {
            $this->setIndustry($data['industry']);
        }
        if (array_key_exists('employeesCount', $data)) {
            $this->setEmployeesCount($data['employeesCount']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('locality', $data)) {
            $this->setLocality($data['locality']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->fields['domain'] ?? null;
    }

    public function setDomain(null|string $domain): static
    {
        $this->fields['domain'] = $domain;

        return $this;
    }

    public function getYearFounded(): ?float
    {
        return $this->fields['yearFounded'] ?? null;
    }

    public function setYearFounded(null|float|string $yearFounded): static
    {
        if (is_string($yearFounded)) {
            $yearFounded = (float) $yearFounded;
        }

        $this->fields['yearFounded'] = $yearFounded;

        return $this;
    }

    public function getIndustry(): ?string
    {
        return $this->fields['industry'] ?? null;
    }

    public function setIndustry(null|string $industry): static
    {
        $this->fields['industry'] = $industry;

        return $this;
    }

    public function getEmployeesCount(): ?float
    {
        return $this->fields['employeesCount'] ?? null;
    }

    public function setEmployeesCount(null|float|string $employeesCount): static
    {
        if (is_string($employeesCount)) {
            $employeesCount = (float) $employeesCount;
        }

        $this->fields['employeesCount'] = $employeesCount;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->fields['country'] ?? null;
    }

    public function setCountry(null|string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->fields['locality'] ?? null;
    }

    public function setLocality(null|string $locality): static
    {
        $this->fields['locality'] = $locality;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('domain', $this->fields)) {
            $data['domain'] = $this->fields['domain'];
        }
        if (array_key_exists('yearFounded', $this->fields)) {
            $data['yearFounded'] = $this->fields['yearFounded'];
        }
        if (array_key_exists('industry', $this->fields)) {
            $data['industry'] = $this->fields['industry'];
        }
        if (array_key_exists('employeesCount', $this->fields)) {
            $data['employeesCount'] = $this->fields['employeesCount'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('locality', $this->fields)) {
            $data['locality'] = $this->fields['locality'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
