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

class Forbidden implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('detail', $data)) {
            $this->setDetail($data['detail']);
        }
        if (array_key_exists('instance', $data)) {
            $this->setInstance($data['instance']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStatus(): ?int
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|int $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): self
    {
        $this->fields['title'] = $title;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->fields['detail'] ?? null;
    }

    public function setDetail(null|string $detail): self
    {
        $this->fields['detail'] = $detail;

        return $this;
    }

    public function getInstance(): ?string
    {
        return $this->fields['instance'] ?? null;
    }

    public function setInstance(null|string $instance): self
    {
        $this->fields['instance'] = $instance;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('detail', $this->fields)) {
            $data['detail'] = $this->fields['detail'];
        }
        if (array_key_exists('instance', $this->fields)) {
            $data['instance'] = $this->fields['instance'];
        }

        return $data;
    }
}
