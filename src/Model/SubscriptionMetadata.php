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

class SubscriptionMetadata implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('riskMetadata', $data)) {
            $this->setRiskMetadata($data['riskMetadata']);
        }
        if (array_key_exists('customFields', $data)) {
            $this->setCustomFields($data['customFields']);
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
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getRiskMetadata(): ?RiskMetadata
    {
        return $this->fields['riskMetadata'] ?? null;
    }

    public function setRiskMetadata(null|RiskMetadata|array $riskMetadata): self
    {
        if ($riskMetadata !== null && !($riskMetadata instanceof RiskMetadata)) {
            $riskMetadata = RiskMetadata::from($riskMetadata);
        }

        $this->fields['riskMetadata'] = $riskMetadata;

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

    /**
     * @return null|array<\Rebilly\Sdk\Model\ApprovalUrlLink|\Rebilly\Sdk\Model\CustomerLink|\Rebilly\Sdk\Model\InitialInvoiceLink|\Rebilly\Sdk\Model\RecentInvoiceLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\WebsiteLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    /**
     * @return null|array{recentInvoice:\Rebilly\Sdk\Model\Invoice,initialInvoice:\Rebilly\Sdk\Model\Invoice,customer:\Rebilly\Sdk\Model\Customer,website:\Rebilly\Sdk\Model\Website,leadSource:\Rebilly\Sdk\Model\LeadSource,shippingRate:\Rebilly\Sdk\Model\ShippingRate,paymentInstrument:\Rebilly\Sdk\Model\PaymentInstrument,upcomingInvoice:\Rebilly\Sdk\Model\Invoice}
     */
    public function getEmbedded(): ?array
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('riskMetadata', $this->fields)) {
            $data['riskMetadata'] = $this->fields['riskMetadata']?->jsonSerialize();
        }
        if (array_key_exists('customFields', $this->fields)) {
            $data['customFields'] = $this->fields['customFields'];
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
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded'];
        }

        return $data;
    }

    private function setRevision(null|int $revision): self
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    /**
     * @param null|array<\Rebilly\Sdk\Model\ApprovalUrlLink|\Rebilly\Sdk\Model\CustomerLink|\Rebilly\Sdk\Model\InitialInvoiceLink|\Rebilly\Sdk\Model\RecentInvoiceLink|\Rebilly\Sdk\Model\SelfLink|\Rebilly\Sdk\Model\WebsiteLink> $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }

    /**
     * @param null|array{recentInvoice:\Rebilly\Sdk\Model\Invoice,initialInvoice:\Rebilly\Sdk\Model\Invoice,customer:\Rebilly\Sdk\Model\Customer,website:\Rebilly\Sdk\Model\Website,leadSource:\Rebilly\Sdk\Model\LeadSource,shippingRate:\Rebilly\Sdk\Model\ShippingRate,paymentInstrument:\Rebilly\Sdk\Model\PaymentInstrument,upcomingInvoice:\Rebilly\Sdk\Model\Invoice} $embedded
     */
    private function setEmbedded(null|array $embedded): self
    {
        $embedded['recentInvoice'] = isset($embedded['recentInvoice']) ? ($embedded['recentInvoice'] instanceof \Rebilly\Sdk\Model\Invoice ? $embedded['recentInvoice'] : \Rebilly\Sdk\Model\Invoice::from($embedded['recentInvoice'])) : null;
        $embedded['initialInvoice'] = isset($embedded['initialInvoice']) ? ($embedded['initialInvoice'] instanceof \Rebilly\Sdk\Model\Invoice ? $embedded['initialInvoice'] : \Rebilly\Sdk\Model\Invoice::from($embedded['initialInvoice'])) : null;
        $embedded['customer'] = isset($embedded['customer']) ? ($embedded['customer'] instanceof \Rebilly\Sdk\Model\Customer ? $embedded['customer'] : \Rebilly\Sdk\Model\Customer::from($embedded['customer'])) : null;
        $embedded['website'] = isset($embedded['website']) ? ($embedded['website'] instanceof \Rebilly\Sdk\Model\Website ? $embedded['website'] : \Rebilly\Sdk\Model\Website::from($embedded['website'])) : null;
        $embedded['leadSource'] = isset($embedded['leadSource']) ? ($embedded['leadSource'] instanceof \Rebilly\Sdk\Model\LeadSource ? $embedded['leadSource'] : \Rebilly\Sdk\Model\LeadSource::from($embedded['leadSource'])) : null;
        $embedded['shippingRate'] = isset($embedded['shippingRate']) ? ($embedded['shippingRate'] instanceof \Rebilly\Sdk\Model\ShippingRate ? $embedded['shippingRate'] : \Rebilly\Sdk\Model\ShippingRate::from($embedded['shippingRate'])) : null;
        $embedded['paymentInstrument'] = isset($embedded['paymentInstrument']) ? ($embedded['paymentInstrument'] instanceof \Rebilly\Sdk\Model\PaymentInstrument ? $embedded['paymentInstrument'] : \Rebilly\Sdk\Model\PaymentInstrument::from($embedded['paymentInstrument'])) : null;
        $embedded['upcomingInvoice'] = isset($embedded['upcomingInvoice']) ? ($embedded['upcomingInvoice'] instanceof \Rebilly\Sdk\Model\Invoice ? $embedded['upcomingInvoice'] : \Rebilly\Sdk\Model\Invoice::from($embedded['upcomingInvoice'])) : null;

        $this->fields['_embedded'] = $embedded;

        return $this;
    }
}
