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

class Customer implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('email', $data)) {
            $this->setEmail($data['email']);
        }
        if (array_key_exists('firstName', $data)) {
            $this->setFirstName($data['firstName']);
        }
        if (array_key_exists('lastName', $data)) {
            $this->setLastName($data['lastName']);
        }
        if (array_key_exists('websiteId', $data)) {
            $this->setWebsiteId($data['websiteId']);
        }
        if (array_key_exists('paymentToken', $data)) {
            $this->setPaymentToken($data['paymentToken']);
        }
        if (array_key_exists('defaultPaymentInstrument', $data)) {
            $this->setDefaultPaymentInstrument($data['defaultPaymentInstrument']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
        }
        if (array_key_exists('primaryAddress', $data)) {
            $this->setPrimaryAddress($data['primaryAddress']);
        }
        if (array_key_exists('averageValue', $data)) {
            $this->setAverageValue($data['averageValue']);
        }
        if (array_key_exists('paymentCount', $data)) {
            $this->setPaymentCount($data['paymentCount']);
        }
        if (array_key_exists('lastPaymentTime', $data)) {
            $this->setLastPaymentTime($data['lastPaymentTime']);
        }
        if (array_key_exists('lifetimeRevenue', $data)) {
            $this->setLifetimeRevenue($data['lifetimeRevenue']);
        }
        if (array_key_exists('invoiceCount', $data)) {
            $this->setInvoiceCount($data['invoiceCount']);
        }
        if (array_key_exists('tags', $data)) {
            $this->setTags($data['tags']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('isEddRequired', $data)) {
            $this->setIsEddRequired($data['isEddRequired']);
        }
        if (array_key_exists('hasFulfilledKyc', $data)) {
            $this->setHasFulfilledKyc($data['hasFulfilledKyc']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
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

    public function getEmail(): ?string
    {
        return $this->fields['email'] ?? null;
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function getWebsiteId(): ?string
    {
        return $this->fields['websiteId'] ?? null;
    }

    public function setWebsiteId(null|string $websiteId): self
    {
        $this->fields['websiteId'] = $websiteId;

        return $this;
    }

    public function getPaymentToken(): ?string
    {
        return $this->fields['paymentToken'] ?? null;
    }

    public function setPaymentToken(null|string $paymentToken): self
    {
        $this->fields['paymentToken'] = $paymentToken;

        return $this;
    }

    public function getDefaultPaymentInstrument(): ?PaymentInstrumentValueObject
    {
        return $this->fields['defaultPaymentInstrument'] ?? null;
    }

    public function setDefaultPaymentInstrument(null|PaymentInstrumentValueObject|array $defaultPaymentInstrument): self
    {
        if ($defaultPaymentInstrument !== null && !($defaultPaymentInstrument instanceof \Rebilly\Sdk\Model\PaymentInstrumentValueObject)) {
            $defaultPaymentInstrument = \Rebilly\Sdk\Model\PaymentInstrumentValueObject::from($defaultPaymentInstrument);
        }

        $this->fields['defaultPaymentInstrument'] = $defaultPaymentInstrument;

        return $this;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    public function getCustomFields(): ?array
    {
        return $this->fields['customFields'] ?? null;
    }

    public function setCustomFields(null|array $customFields): self
    {
        $this->fields['customFields'] = $customFields;

        return $this;
    }

    public function getPrimaryAddress(): ?ContactObject
    {
        return $this->fields['primaryAddress'] ?? null;
    }

    public function setPrimaryAddress(null|ContactObject|array $primaryAddress): self
    {
        if ($primaryAddress !== null && !($primaryAddress instanceof \Rebilly\Sdk\Model\ContactObject)) {
            $primaryAddress = \Rebilly\Sdk\Model\ContactObject::from($primaryAddress);
        }

        $this->fields['primaryAddress'] = $primaryAddress;

        return $this;
    }

    public function getAverageValue(): ?CustomerAverageValue
    {
        return $this->fields['averageValue'] ?? null;
    }

    public function setAverageValue(null|CustomerAverageValue|array $averageValue): self
    {
        if ($averageValue !== null && !($averageValue instanceof \Rebilly\Sdk\Model\CustomerAverageValue)) {
            $averageValue = \Rebilly\Sdk\Model\CustomerAverageValue::from($averageValue);
        }

        $this->fields['averageValue'] = $averageValue;

        return $this;
    }

    public function getPaymentCount(): ?int
    {
        return $this->fields['paymentCount'] ?? null;
    }

    public function getLastPaymentTime(): ?DateTimeImmutable
    {
        return $this->fields['lastPaymentTime'] ?? null;
    }

    public function setLastPaymentTime(null|DateTimeImmutable|string $lastPaymentTime): self
    {
        if ($lastPaymentTime !== null && !($lastPaymentTime instanceof DateTimeImmutable)) {
            $lastPaymentTime = new DateTimeImmutable($lastPaymentTime);
        }

        $this->fields['lastPaymentTime'] = $lastPaymentTime;

        return $this;
    }

    public function getLifetimeRevenue(): ?CustomerLifetimeRevenue
    {
        return $this->fields['lifetimeRevenue'] ?? null;
    }

    public function setLifetimeRevenue(null|CustomerLifetimeRevenue|array $lifetimeRevenue): self
    {
        if ($lifetimeRevenue !== null && !($lifetimeRevenue instanceof \Rebilly\Sdk\Model\CustomerLifetimeRevenue)) {
            $lifetimeRevenue = \Rebilly\Sdk\Model\CustomerLifetimeRevenue::from($lifetimeRevenue);
        }

        $this->fields['lifetimeRevenue'] = $lifetimeRevenue;

        return $this;
    }

    public function getInvoiceCount(): ?int
    {
        return $this->fields['invoiceCount'] ?? null;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\Tag[]
     */
    public function getTags(): ?array
    {
        return $this->fields['tags'] ?? null;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getIsEddRequired(): ?bool
    {
        return $this->fields['isEddRequired'] ?? null;
    }

    public function setIsEddRequired(null|bool $isEddRequired): self
    {
        $this->fields['isEddRequired'] = $isEddRequired;

        return $this;
    }

    public function getHasFulfilledKyc(): ?bool
    {
        return $this->fields['hasFulfilledKyc'] ?? null;
    }

    /**
     * @return null|array<\Rebilly\Sdk\Model\DefaultPaymentInstrumentLink|\Rebilly\Sdk\Model\LeadSourceLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\WebsiteLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{leadSource:\Rebilly\Sdk\Model\LeadSource}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('email', $this->fields)) {
            $data['email'] = $this->fields['email'];
        }
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('websiteId', $this->fields)) {
            $data['websiteId'] = $this->fields['websiteId'];
        }
        if (array_key_exists('paymentToken', $this->fields)) {
            $data['paymentToken'] = $this->fields['paymentToken'];
        }
        if (array_key_exists('defaultPaymentInstrument', $this->fields)) {
            $data['defaultPaymentInstrument'] = $this->fields['defaultPaymentInstrument']?->jsonSerialize();
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
        }
        if (array_key_exists('primaryAddress', $this->fields)) {
            $data['primaryAddress'] = $this->fields['primaryAddress']?->jsonSerialize();
        }
        if (array_key_exists('averageValue', $this->fields)) {
            $data['averageValue'] = $this->fields['averageValue']?->jsonSerialize();
        }
        if (array_key_exists('paymentCount', $this->fields)) {
            $data['paymentCount'] = $this->fields['paymentCount'];
        }
        if (array_key_exists('lastPaymentTime', $this->fields)) {
            $data['lastPaymentTime'] = $this->fields['lastPaymentTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('lifetimeRevenue', $this->fields)) {
            $data['lifetimeRevenue'] = $this->fields['lifetimeRevenue']?->jsonSerialize();
        }
        if (array_key_exists('invoiceCount', $this->fields)) {
            $data['invoiceCount'] = $this->fields['invoiceCount'];
        }
        if (array_key_exists('tags', $this->fields)) {
            $data['tags'] = $this->fields['tags'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('isEddRequired', $this->fields)) {
            $data['isEddRequired'] = $this->fields['isEddRequired'];
        }
        if (array_key_exists('hasFulfilledKyc', $this->fields)) {
            $data['hasFulfilledKyc'] = $this->fields['hasFulfilledKyc'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setEmail(null|string $email): self
    {
        $this->fields['email'] = $email;

        return $this;
    }

    private function setFirstName(null|string $firstName): self
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    private function setLastName(null|string $lastName): self
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    private function setPaymentCount(null|int $paymentCount): self
    {
        $this->fields['paymentCount'] = $paymentCount;

        return $this;
    }

    private function setInvoiceCount(null|int $invoiceCount): self
    {
        $this->fields['invoiceCount'] = $invoiceCount;

        return $this;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\Tag[] $tags
     */
    private function setTags(null|array $tags): self
    {
        $tags = $tags !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\Tag ? $value : \Rebilly\Sdk\Model\Tag::from($value)) : null, $tags) : null;

        $this->fields['tags'] = $tags;

        return $this;
    }

    private function setRevision(null|int $revision): self
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    private function setHasFulfilledKyc(null|bool $hasFulfilledKyc): self
    {
        $this->fields['hasFulfilledKyc'] = $hasFulfilledKyc;

        return $this;
    }

    /**
     * @param null|array<\Rebilly\Sdk\Model\DefaultPaymentInstrumentLink|\Rebilly\Sdk\Model\LeadSourceLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\WebsiteLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{leadSource:\Rebilly\Sdk\Model\LeadSource} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['leadSource'] = isset($embedded['leadSource']) ? ($embedded['leadSource'] instanceof \Rebilly\Sdk\Model\LeadSource ? $embedded['leadSource'] : \Rebilly\Sdk\Model\LeadSource::from($embedded['leadSource'])) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
