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

class SandboxRetention implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('autoCancelTime', $data)) {
            $this->setAutoCancelTime($data['autoCancelTime']);
        }
        if (array_key_exists('excluded', $data)) {
            $this->setExcluded($data['excluded']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getAutoCancelTime(): ?DateTimeImmutable
    {
        return $this->fields['autoCancelTime'] ?? null;
    }

    public function getExcluded(): bool
    {
        return $this->fields['excluded'];
    }

    public function setExcluded(bool $excluded): static
    {
        $this->fields['excluded'] = $excluded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('autoCancelTime', $this->fields)) {
            $data['autoCancelTime'] = $this->fields['autoCancelTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('excluded', $this->fields)) {
            $data['excluded'] = $this->fields['excluded'];
        }

        return $data;
    }

    private function setAutoCancelTime(null|DateTimeImmutable|string $autoCancelTime): static
    {
        if ($autoCancelTime !== null && !($autoCancelTime instanceof DateTimeImmutable)) {
            $autoCancelTime = new DateTimeImmutable($autoCancelTime);
        }

        $this->fields['autoCancelTime'] = $autoCancelTime;

        return $this;
    }
}
