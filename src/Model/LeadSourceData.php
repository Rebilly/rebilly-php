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

class LeadSourceData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('medium', $data)) {
            $this->setMedium($data['medium']);
        }
        if (array_key_exists('source', $data)) {
            $this->setSource($data['source']);
        }
        if (array_key_exists('campaign', $data)) {
            $this->setCampaign($data['campaign']);
        }
        if (array_key_exists('term', $data)) {
            $this->setTerm($data['term']);
        }
        if (array_key_exists('content', $data)) {
            $this->setContent($data['content']);
        }
        if (array_key_exists('affiliate', $data)) {
            $this->setAffiliate($data['affiliate']);
        }
        if (array_key_exists('subAffiliate', $data)) {
            $this->setSubAffiliate($data['subAffiliate']);
        }
        if (array_key_exists('salesAgent', $data)) {
            $this->setSalesAgent($data['salesAgent']);
        }
        if (array_key_exists('clickId', $data)) {
            $this->setClickId($data['clickId']);
        }
        if (array_key_exists('path', $data)) {
            $this->setPath($data['path']);
        }
        if (array_key_exists('referrer', $data)) {
            $this->setReferrer($data['referrer']);
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

    public function getMedium(): ?string
    {
        return $this->fields['medium'] ?? null;
    }

    public function setMedium(null|string $medium): static
    {
        $this->fields['medium'] = $medium;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->fields['source'] ?? null;
    }

    public function setSource(null|string $source): static
    {
        $this->fields['source'] = $source;

        return $this;
    }

    public function getCampaign(): ?string
    {
        return $this->fields['campaign'] ?? null;
    }

    public function setCampaign(null|string $campaign): static
    {
        $this->fields['campaign'] = $campaign;

        return $this;
    }

    public function getTerm(): ?string
    {
        return $this->fields['term'] ?? null;
    }

    public function setTerm(null|string $term): static
    {
        $this->fields['term'] = $term;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->fields['content'] ?? null;
    }

    public function setContent(null|string $content): static
    {
        $this->fields['content'] = $content;

        return $this;
    }

    public function getAffiliate(): ?string
    {
        return $this->fields['affiliate'] ?? null;
    }

    public function setAffiliate(null|string $affiliate): static
    {
        $this->fields['affiliate'] = $affiliate;

        return $this;
    }

    public function getSubAffiliate(): ?string
    {
        return $this->fields['subAffiliate'] ?? null;
    }

    public function setSubAffiliate(null|string $subAffiliate): static
    {
        $this->fields['subAffiliate'] = $subAffiliate;

        return $this;
    }

    public function getSalesAgent(): ?string
    {
        return $this->fields['salesAgent'] ?? null;
    }

    public function setSalesAgent(null|string $salesAgent): static
    {
        $this->fields['salesAgent'] = $salesAgent;

        return $this;
    }

    public function getClickId(): ?string
    {
        return $this->fields['clickId'] ?? null;
    }

    public function setClickId(null|string $clickId): static
    {
        $this->fields['clickId'] = $clickId;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->fields['path'] ?? null;
    }

    public function setPath(null|string $path): static
    {
        $this->fields['path'] = $path;

        return $this;
    }

    public function getReferrer(): ?string
    {
        return $this->fields['referrer'] ?? null;
    }

    public function setReferrer(null|string $referrer): static
    {
        $this->fields['referrer'] = $referrer;

        return $this;
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
     * @return null|array<CustomerLink|SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('medium', $this->fields)) {
            $data['medium'] = $this->fields['medium'];
        }
        if (array_key_exists('source', $this->fields)) {
            $data['source'] = $this->fields['source'];
        }
        if (array_key_exists('campaign', $this->fields)) {
            $data['campaign'] = $this->fields['campaign'];
        }
        if (array_key_exists('term', $this->fields)) {
            $data['term'] = $this->fields['term'];
        }
        if (array_key_exists('content', $this->fields)) {
            $data['content'] = $this->fields['content'];
        }
        if (array_key_exists('affiliate', $this->fields)) {
            $data['affiliate'] = $this->fields['affiliate'];
        }
        if (array_key_exists('subAffiliate', $this->fields)) {
            $data['subAffiliate'] = $this->fields['subAffiliate'];
        }
        if (array_key_exists('salesAgent', $this->fields)) {
            $data['salesAgent'] = $this->fields['salesAgent'];
        }
        if (array_key_exists('clickId', $this->fields)) {
            $data['clickId'] = $this->fields['clickId'];
        }
        if (array_key_exists('path', $this->fields)) {
            $data['path'] = $this->fields['path'];
        }
        if (array_key_exists('referrer', $this->fields)) {
            $data['referrer'] = $this->fields['referrer'];
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
     * @param null|array<CustomerLink|SelfLink> $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
