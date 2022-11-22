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

class InvalidError implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('detail', $data)) {
            $this->setDetail($data['detail']);
        }
        if (array_key_exists('error', $data)) {
            $this->setError($data['error']);
        }
        if (array_key_exists('invalidFields', $data)) {
            $this->setInvalidFields($data['invalidFields']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
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

    public function getStatus(): ?int
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|int $status): self
    {
        $this->fields['status'] = $status;

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

    public function getError(): ?string
    {
        return $this->fields['error'] ?? null;
    }

    public function setError(null|string $error): self
    {
        $this->fields['error'] = $error;

        return $this;
    }

    /**
     * @return null|ValidationError1InvalidFields[]
     */
    public function getInvalidFields(): ?array
    {
        return $this->fields['invalidFields'] ?? null;
    }

    /**
     * @param null|ValidationError1InvalidFields[] $invalidFields
     */
    public function setInvalidFields(null|array $invalidFields): self
    {
        $invalidFields = $invalidFields !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof ValidationError1InvalidFields ? $value : ValidationError1InvalidFields::from($value)) : null, $invalidFields) : null;

        $this->fields['invalidFields'] = $invalidFields;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('detail', $this->fields)) {
            $data['detail'] = $this->fields['detail'];
        }
        if (array_key_exists('error', $this->fields)) {
            $data['error'] = $this->fields['error'];
        }
        if (array_key_exists('invalidFields', $this->fields)) {
            $data['invalidFields'] = $this->fields['invalidFields'];
        }

        return $data;
    }
}
