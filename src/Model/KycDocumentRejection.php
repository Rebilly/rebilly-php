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

class KycDocumentRejection implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('message', $data)) {
            $this->setMessage($data['message']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): ?KycDocumentRejectionReasonTypes
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|KycDocumentRejectionReasonTypes|string $type): static
    {
        if ($type !== null && !($type instanceof KycDocumentRejectionReasonTypes)) {
            $type = KycDocumentRejectionReasonTypes::from($type);
        }

        $this->fields['type'] = $type;

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
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type']?->value;
        }
        if (array_key_exists('message', $this->fields)) {
            $data['message'] = $this->fields['message'];
        }

        return $data;
    }
}
