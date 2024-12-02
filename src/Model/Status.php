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

class Status implements JsonSerializable
{
    public const STATUS_OK = 'ok';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('time', $data)) {
            $this->setTime($data['time']);
        }
        if (array_key_exists('release', $data)) {
            $this->setRelease($data['release']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getTime(): ?DateTimeImmutable
    {
        return $this->fields['time'] ?? null;
    }

    public function getRelease(): ?string
    {
        return $this->fields['release'] ?? null;
    }

    public function setRelease(null|string $release): static
    {
        $this->fields['release'] = $release;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('time', $this->fields)) {
            $data['time'] = $this->fields['time']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('release', $this->fields)) {
            $data['release'] = $this->fields['release'];
        }

        return $data;
    }

    private function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setTime(null|DateTimeImmutable|string $time): static
    {
        if ($time !== null && !($time instanceof DateTimeImmutable)) {
            $time = new DateTimeImmutable($time);
        }

        $this->fields['time'] = $time;

        return $this;
    }
}
