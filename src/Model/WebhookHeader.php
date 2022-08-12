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

class WebhookHeader implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('value', $data)) {
            $this->setValue($data['value']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): self
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getStatus(): ?OnOff
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|OnOff|string $status): self
    {
        if ($status !== null && !($status instanceof \Rebilly\Sdk\Model\OnOff)) {
            $status = \Rebilly\Sdk\Model\OnOff::from($status);
        }

        $this->fields['status'] = $status;

        return $this;
    }

    public function getValue(): string
    {
        return $this->fields['value'];
    }

    public function setValue(string $value): self
    {
        $this->fields['value'] = $value;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status']?->value;
        }
        if (array_key_exists('value', $this->fields)) {
            $data['value'] = $this->fields['value'];
        }

        return $data;
    }
}
