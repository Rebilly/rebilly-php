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

class PaymentMethodMetadata implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('apiName', $data)) {
            $this->setApiName($data['apiName']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('landscapeLogo', $data)) {
            $this->setLandscapeLogo($data['landscapeLogo']);
        }
        if (array_key_exists('portraitLogo', $data)) {
            $this->setPortraitLogo($data['portraitLogo']);
        }
        if (array_key_exists('summary', $data)) {
            $this->setSummary($data['summary']);
        }
        if (array_key_exists('description', $data)) {
            $this->setDescription($data['description']);
        }
        if (array_key_exists('countries', $data)) {
            $this->setCountries($data['countries']);
        }
        if (array_key_exists('storefrontEnabled', $data)) {
            $this->setStorefrontEnabled($data['storefrontEnabled']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getApiName(): string
    {
        return $this->fields['apiName'];
    }

    public function setApiName(string $apiName): static
    {
        $this->fields['apiName'] = $apiName;

        return $this;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getLandscapeLogo(): ?string
    {
        return $this->fields['landscapeLogo'] ?? null;
    }

    public function setLandscapeLogo(null|string $landscapeLogo): static
    {
        $this->fields['landscapeLogo'] = $landscapeLogo;

        return $this;
    }

    public function getPortraitLogo(): ?string
    {
        return $this->fields['portraitLogo'] ?? null;
    }

    public function setPortraitLogo(null|string $portraitLogo): static
    {
        $this->fields['portraitLogo'] = $portraitLogo;

        return $this;
    }

    public function getSummary(): string
    {
        return $this->fields['summary'];
    }

    public function setSummary(string $summary): static
    {
        $this->fields['summary'] = $summary;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->fields['description'];
    }

    public function setDescription(string $description): static
    {
        $this->fields['description'] = $description;

        return $this;
    }

    public function getCountries(): CountriesMetadata
    {
        return $this->fields['countries'];
    }

    public function setCountries(CountriesMetadata|array $countries): static
    {
        if (!($countries instanceof CountriesMetadata)) {
            $countries = CountriesMetadataFactory::from($countries);
        }

        $this->fields['countries'] = $countries;

        return $this;
    }

    public function getStorefrontEnabled(): ?bool
    {
        return $this->fields['storefrontEnabled'] ?? null;
    }

    public function setStorefrontEnabled(null|bool $storefrontEnabled): static
    {
        $this->fields['storefrontEnabled'] = $storefrontEnabled;

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
        if (array_key_exists('apiName', $this->fields)) {
            $data['apiName'] = $this->fields['apiName'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('landscapeLogo', $this->fields)) {
            $data['landscapeLogo'] = $this->fields['landscapeLogo'];
        }
        if (array_key_exists('portraitLogo', $this->fields)) {
            $data['portraitLogo'] = $this->fields['portraitLogo'];
        }
        if (array_key_exists('summary', $this->fields)) {
            $data['summary'] = $this->fields['summary'];
        }
        if (array_key_exists('description', $this->fields)) {
            $data['description'] = $this->fields['description'];
        }
        if (array_key_exists('countries', $this->fields)) {
            $data['countries'] = $this->fields['countries']?->jsonSerialize();
        }
        if (array_key_exists('storefrontEnabled', $this->fields)) {
            $data['storefrontEnabled'] = $this->fields['storefrontEnabled'];
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
