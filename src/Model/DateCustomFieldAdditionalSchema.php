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
use JsonSerializable;

class DateCustomFieldAdditionalSchema implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('required', $data)) {
            $this->setRequired($data['required']);
        }
        if (array_key_exists('default', $data)) {
            $this->setDefault($data['default']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRequired(): ?bool
    {
        return $this->fields['required'] ?? null;
    }

    public function setRequired(null|bool $required): static
    {
        $this->fields['required'] = $required;

        return $this;
    }

    public function getDefault(): ?DateTimeImmutable
    {
        return $this->fields['default'] ?? null;
    }

    public function setDefault(null|DateTimeImmutable|string $default): static
    {
        if ($default !== null && !($default instanceof DateTimeImmutable)) {
            $default = new DateTimeImmutable($default);
        }

        $this->fields['default'] = $default;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('required', $this->fields)) {
            $data['required'] = $this->fields['required'];
        }
        if (array_key_exists('default', $this->fields)) {
            $data['default'] = $this->fields['default']?->format('Y-m-d');
        }

        return $data;
    }
}
