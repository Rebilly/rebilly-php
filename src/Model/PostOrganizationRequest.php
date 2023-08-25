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

class PostOrganizationRequest implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('website', $data)) {
            $this->setWebsite($data['website']);
        }
        if (array_key_exists('address', $data)) {
            $this->setAddress($data['address']);
        }
        if (array_key_exists('address2', $data)) {
            $this->setAddress2($data['address2']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('country', $data)) {
            $this->setCountry($data['country']);
        }
        if (array_key_exists('postalCode', $data)) {
            $this->setPostalCode($data['postalCode']);
        }
        if (array_key_exists('phoneNumbers', $data)) {
            $this->setPhoneNumbers($data['phoneNumbers']);
        }
        if (array_key_exists('emails', $data)) {
            $this->setEmails($data['emails']);
        }
        if (array_key_exists('taxDescriptor', $data)) {
            $this->setTaxDescriptor($data['taxDescriptor']);
        }
        if (array_key_exists('invoiceTimeZone', $data)) {
            $this->setInvoiceTimeZone($data['invoiceTimeZone']);
        }
        if (array_key_exists('reportCurrency', $data)) {
            $this->setReportCurrency($data['reportCurrency']);
        }
        if (array_key_exists('questionnaire', $data)) {
            $this->setQuestionnaire($data['questionnaire']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
        if (array_key_exists('taxNumbers', $data)) {
            $this->setTaxNumbers($data['taxNumbers']);
        }
        if (array_key_exists('features', $data)) {
            $this->setFeatures($data['features']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
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

    public function getWebsite(): string
    {
        return $this->fields['website'];
    }

    public function setWebsite(string $website): static
    {
        $this->fields['website'] = $website;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->fields['address'] ?? null;
    }

    public function setAddress(null|string $address): static
    {
        $this->fields['address'] = $address;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->fields['address2'] ?? null;
    }

    public function setAddress2(null|string $address2): static
    {
        $this->fields['address2'] = $address2;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function setCity(null|string $city): static
    {
        $this->fields['city'] = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function setRegion(null|string $region): static
    {
        $this->fields['region'] = $region;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->fields['country'];
    }

    public function setCountry(string $country): static
    {
        $this->fields['country'] = $country;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->fields['postalCode'] ?? null;
    }

    public function setPostalCode(null|string $postalCode): static
    {
        $this->fields['postalCode'] = $postalCode;

        return $this;
    }

    public function getPhoneNumbers(): ?ContactPhoneNumbers
    {
        return $this->fields['phoneNumbers'] ?? null;
    }

    public function setPhoneNumbers(null|ContactPhoneNumbers $phoneNumbers): static
    {
        $this->fields['phoneNumbers'] = $phoneNumbers;

        return $this;
    }

    public function getEmails(): ?ContactEmails
    {
        return $this->fields['emails'] ?? null;
    }

    public function setEmails(null|ContactEmails $emails): static
    {
        $this->fields['emails'] = $emails;

        return $this;
    }

    public function getTaxDescriptor(): ?string
    {
        return $this->fields['taxDescriptor'] ?? null;
    }

    public function setTaxDescriptor(null|string $taxDescriptor): static
    {
        $this->fields['taxDescriptor'] = $taxDescriptor;

        return $this;
    }

    public function getInvoiceTimeZone(): ?string
    {
        return $this->fields['invoiceTimeZone'] ?? null;
    }

    public function setInvoiceTimeZone(null|string $invoiceTimeZone): static
    {
        $this->fields['invoiceTimeZone'] = $invoiceTimeZone;

        return $this;
    }

    public function getReportCurrency(): string
    {
        return $this->fields['reportCurrency'];
    }

    public function setReportCurrency(string $reportCurrency): static
    {
        $this->fields['reportCurrency'] = $reportCurrency;

        return $this;
    }

    public function getQuestionnaire(): ?OrganizationQuestionnaire
    {
        return $this->fields['questionnaire'] ?? null;
    }

    public function setQuestionnaire(null|OrganizationQuestionnaire|array $questionnaire): static
    {
        if ($questionnaire !== null && !($questionnaire instanceof OrganizationQuestionnaire)) {
            $questionnaire = OrganizationQuestionnaire::from($questionnaire);
        }

        $this->fields['questionnaire'] = $questionnaire;

        return $this;
    }

    public function getSettings(): ?OrganizationSettings
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|OrganizationSettings|array $settings): static
    {
        if ($settings !== null && !($settings instanceof OrganizationSettings)) {
            $settings = OrganizationSettings::from($settings);
        }

        $this->fields['settings'] = $settings;

        return $this;
    }

    /**
     * @return null|TaxNumber[]
     */
    public function getTaxNumbers(): ?array
    {
        return $this->fields['taxNumbers'] ?? null;
    }

    /**
     * @param null|array[]|TaxNumber[] $taxNumbers
     */
    public function setTaxNumbers(null|array $taxNumbers): static
    {
        $taxNumbers = $taxNumbers !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof TaxNumber ? $value : TaxNumber::from($value)) : null,
            $taxNumbers,
        ) : null;

        $this->fields['taxNumbers'] = $taxNumbers;

        return $this;
    }

    /**
     * @return null|OrganizationFeatures[]
     */
    public function getFeatures(): ?array
    {
        return $this->fields['features'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
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
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('website', $this->fields)) {
            $data['website'] = $this->fields['website'];
        }
        if (array_key_exists('address', $this->fields)) {
            $data['address'] = $this->fields['address'];
        }
        if (array_key_exists('address2', $this->fields)) {
            $data['address2'] = $this->fields['address2'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('country', $this->fields)) {
            $data['country'] = $this->fields['country'];
        }
        if (array_key_exists('postalCode', $this->fields)) {
            $data['postalCode'] = $this->fields['postalCode'];
        }
        if (array_key_exists('phoneNumbers', $this->fields)) {
            $data['phoneNumbers'] = $this->fields['phoneNumbers'];
        }
        if (array_key_exists('emails', $this->fields)) {
            $data['emails'] = $this->fields['emails'];
        }
        if (array_key_exists('taxDescriptor', $this->fields)) {
            $data['taxDescriptor'] = $this->fields['taxDescriptor'];
        }
        if (array_key_exists('invoiceTimeZone', $this->fields)) {
            $data['invoiceTimeZone'] = $this->fields['invoiceTimeZone'];
        }
        if (array_key_exists('reportCurrency', $this->fields)) {
            $data['reportCurrency'] = $this->fields['reportCurrency'];
        }
        if (array_key_exists('questionnaire', $this->fields)) {
            $data['questionnaire'] = $this->fields['questionnaire']?->jsonSerialize();
        }
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings']?->jsonSerialize();
        }
        if (array_key_exists('taxNumbers', $this->fields)) {
            $data['taxNumbers'] = $this->fields['taxNumbers'];
        }
        if (array_key_exists('features', $this->fields)) {
            $data['features'] = $this->fields['features'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @param null|array[]|OrganizationFeatures[] $features
     */
    private function setFeatures(null|array $features): static
    {
        $features = $features !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof OrganizationFeatures ? $value : OrganizationFeatures::from($value)) : null,
            $features,
        ) : null;

        $this->fields['features'] = $features;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
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
