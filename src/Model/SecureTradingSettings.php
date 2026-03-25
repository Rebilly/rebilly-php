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

class SecureTradingSettings implements JsonSerializable
{
    use HasMetadata;

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('enableRecurring', $data)) {
            $this->setEnableRecurring($data['enableRecurring']);
        }
        if (array_key_exists('useParentTransactionOnFile', $data)) {
            $this->setUseParentTransactionOnFile($data['useParentTransactionOnFile']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getEnableRecurring(): ?bool
    {
        return $this->fields['enableRecurring'] ?? null;
    }

    public function setEnableRecurring(null|bool $enableRecurring): static
    {
        $this->fields['enableRecurring'] = $enableRecurring;

        return $this;
    }

    public function getUseParentTransactionOnFile(): ?bool
    {
        return $this->fields['useParentTransactionOnFile'] ?? null;
    }

    public function setUseParentTransactionOnFile(null|bool $useParentTransactionOnFile): static
    {
        $this->fields['useParentTransactionOnFile'] = $useParentTransactionOnFile;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('enableRecurring', $this->fields)) {
            $data['enableRecurring'] = $this->fields['enableRecurring'];
        }
        if (array_key_exists('useParentTransactionOnFile', $this->fields)) {
            $data['useParentTransactionOnFile'] = $this->fields['useParentTransactionOnFile'];
        }

        return $data;
    }
}
