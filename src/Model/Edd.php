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

class Edd implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('parsedScore', $data)) {
            $this->setParsedScore($data['parsedScore']);
        }
        if (array_key_exists('score', $data)) {
            $this->setScore($data['score']);
        }
        if (array_key_exists('nextUpdateTime', $data)) {
            $this->setNextUpdateTime($data['nextUpdateTime']);
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

    public function getParsedScore(): ?EddData
    {
        return $this->fields['parsedScore'] ?? null;
    }

    public function setParsedScore(null|EddData|array $parsedScore): static
    {
        if ($parsedScore !== null && !($parsedScore instanceof EddData)) {
            $parsedScore = EddData::from($parsedScore);
        }

        $this->fields['parsedScore'] = $parsedScore;

        return $this;
    }

    public function getScore(): ?EddData
    {
        return $this->fields['score'] ?? null;
    }

    public function setScore(null|EddData|array $score): static
    {
        if ($score !== null && !($score instanceof EddData)) {
            $score = EddData::from($score);
        }

        $this->fields['score'] = $score;

        return $this;
    }

    public function getNextUpdateTime(): ?DateTimeImmutable
    {
        return $this->fields['nextUpdateTime'] ?? null;
    }

    public function setNextUpdateTime(null|DateTimeImmutable|string $nextUpdateTime): static
    {
        if ($nextUpdateTime !== null && !($nextUpdateTime instanceof DateTimeImmutable)) {
            $nextUpdateTime = new DateTimeImmutable($nextUpdateTime);
        }

        $this->fields['nextUpdateTime'] = $nextUpdateTime;

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
     * @return null|array<EddArrestSearchResultLink|EddBankruptcySearchResultLink|EddFraudSearchResultLink|EddOccupationSearchResultLink|SelfLink>
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('parsedScore', $this->fields)) {
            $data['parsedScore'] = $this->fields['parsedScore']?->jsonSerialize();
        }
        if (array_key_exists('score', $this->fields)) {
            $data['score'] = $this->fields['score']?->jsonSerialize();
        }
        if (array_key_exists('nextUpdateTime', $this->fields)) {
            $data['nextUpdateTime'] = $this->fields['nextUpdateTime']?->format(DateTimeInterface::RFC3339);
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
     * @param null|array<EddArrestSearchResultLink|EddBankruptcySearchResultLink|EddFraudSearchResultLink|EddOccupationSearchResultLink|SelfLink> $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value ?? null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
