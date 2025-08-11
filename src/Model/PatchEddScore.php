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

class PatchEddScore implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('score', $data)) {
            $this->setScore($data['score']);
        }
        if (array_key_exists('nextUpdateTime', $data)) {
            $this->setNextUpdateTime($data['nextUpdateTime']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getScore(): ?PatchEddScoreScore
    {
        return $this->fields['score'] ?? null;
    }

    public function setScore(null|PatchEddScoreScore|array $score): static
    {
        if ($score !== null && !($score instanceof PatchEddScoreScore)) {
            $score = PatchEddScoreScore::from($score);
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

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('score', $this->fields)) {
            $data['score'] = $this->fields['score']?->jsonSerialize();
        }
        if (array_key_exists('nextUpdateTime', $this->fields)) {
            $data['nextUpdateTime'] = $this->fields['nextUpdateTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }
}
