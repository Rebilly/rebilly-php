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
use Rebilly\Sdk\Trait\HasMetadata;

class UsageStatus implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('isSoftLimitReached', $data)) {
            $this->setIsSoftLimitReached($data['isSoftLimitReached']);
        }
        if (array_key_exists('isHardLimitReached', $data)) {
            $this->setIsHardLimitReached($data['isHardLimitReached']);
        }
        if (array_key_exists('isTrialLimitReached', $data)) {
            $this->setIsTrialLimitReached($data['isTrialLimitReached']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getIsSoftLimitReached(): ?bool
    {
        return $this->fields['isSoftLimitReached'] ?? null;
    }

    public function setIsSoftLimitReached(null|bool $isSoftLimitReached): static
    {
        $this->fields['isSoftLimitReached'] = $isSoftLimitReached;

        return $this;
    }

    public function getIsHardLimitReached(): ?bool
    {
        return $this->fields['isHardLimitReached'] ?? null;
    }

    public function setIsHardLimitReached(null|bool $isHardLimitReached): static
    {
        $this->fields['isHardLimitReached'] = $isHardLimitReached;

        return $this;
    }

    public function getIsTrialLimitReached(): ?bool
    {
        return $this->fields['isTrialLimitReached'] ?? null;
    }

    public function setIsTrialLimitReached(null|bool $isTrialLimitReached): static
    {
        $this->fields['isTrialLimitReached'] = $isTrialLimitReached;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('isSoftLimitReached', $this->fields)) {
            $data['isSoftLimitReached'] = $this->fields['isSoftLimitReached'];
        }
        if (array_key_exists('isHardLimitReached', $this->fields)) {
            $data['isHardLimitReached'] = $this->fields['isHardLimitReached'];
        }
        if (array_key_exists('isTrialLimitReached', $this->fields)) {
            $data['isTrialLimitReached'] = $this->fields['isTrialLimitReached'];
        }

        return $data;
    }
}
