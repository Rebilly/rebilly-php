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

class ValidationError1InvalidFields implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('field', $data)) {
            $this->setField($data['field']);
        }
        if (array_key_exists('message', $data)) {
            $this->setMessage($data['message']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getField(): ?string
    {
        return $this->fields['field'] ?? null;
    }

    public function setField(null|string $field): static
    {
        $this->fields['field'] = $field;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->fields['message'] ?? null;
    }

    public function setMessage(null|string $message): static
    {
        $this->fields['message'] = $message;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('field', $this->fields)) {
            $data['field'] = $this->fields['field'];
        }
        if (array_key_exists('message', $this->fields)) {
            $data['message'] = $this->fields['message'];
        }

        return $data;
    }
}
